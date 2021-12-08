import telebot
import configure
import mysql.connector
from telebot import types

bot = telebot.TeleBot(configure.config['token'])

db = mysql.connector.connect(
	host="localhost",
	user="root",
	passwd="",
	port="3306",
	database="pass_system"
)

cursor = db.cursor()
#cursor.execute('CREATE DATABASE pass_system')

#cursor.execute("ALTER TABLE users ADD COLUMN (id INT AUTO_INCREMENT PRIMARY KEY, user_id INT UNIQUE)")

#sql = "INSERT INTO users (name, phone_number, lot_number, user_id) VALUES (%s, %s, %s, %s)"
#val = ("Козлов Даниил Анатольевич", "79027220728", "1", "1")
#cursor.execute(sql, val)
#db.commit()

#print(cursor.rowcount, "Запись добавлена")

user_data = {}
reg_car = {}

class User: 
	def __init__(self, name):
		self.name = name
		self.phonenumber = ''
		self.lotnumber = ''

class Car:
	def __init__(self, regcar):
		self.numcar = numcar
		self.addinfo = ''
		self.datatime = ''
		self.address = ''
		self.fullname = ''
		self.phonenumbers = ''
		self.comment = ''

@bot.message_handler(commands=['start'])
def start (message):
	markup = types.ReplyKeyboardMarkup(resize_keyboard = True)
	item1 = types.KeyboardButton('/Регистрация')
	item2 = types.KeyboardButton('/Авторизация')
	item3 = types.KeyboardButton('/Сайт')

	markup.add(item1, item2, item3)

	bot.send_message(message.chat.id, 'Здравствуйте, {0.first_name}, для возможности подачи заявки вам необходимо авторизироваться!'.format(message.from_user), reply_markup = markup)


@bot.message_handler(commands=['Регистрация', 'help'])
def send_welcome(message):
	msg = bot.send_message(message.chat.id, "Введите ФИО")
	bot.register_next_step_handler(msg, process_name_step)

def process_name_step(message):
	try:
		user_id = message.from_user.id
		user_data[user_id] = User(message.text)

		msg = bot.send_message(message.chat.id, "Введите номер телефона")
		bot.register_next_step_handler(msg, process_phonenumber_step)
	except Exception as e:
		bot.reply_to(message, 'Ошибка')

def process_phonenumber_step(message):
	try:
		user_id = message.from_user.id
		user= user_data[user_id]
		user.phonenumber = message.text

		msg = bot.send_message(message.chat.id, "Введите номер участка")
		bot.register_next_step_handler(msg, process_lotnumber_step)
	except Exception as e:
		bot.reply_to(message, 'Ошибка')

def process_lotnumber_step(message):
	try:
		user_id = message.from_user.id
		user = user_data[user_id]
		user.lotnumber = message.text

		sql = "INSERT INTO users (name, phone_number, lot_number, user_id) VALUES (%s, %s, %s, %s)"
		val = (user.name, user.phonenumber, user.lotnumber, user_id)
		cursor.execute(sql, val)
		db.commit()



		bot.send_message(message.chat.id, "Регистрация завершена")
		markup = types.ReplyKeyboardMarkup(resize_keyboard = True, one_time_keyboard=True)
		item1 = types.KeyboardButton('/Регистрация')
		item2 = types.KeyboardButton('/Авторизация')
		item3 = types.KeyboardButton('/Сайт')

		markup.add(item1, item2, item3)


	except Exception as e:
		bot.reply_to(message, 'Ошибка или вы уже зарегистрированы')

	


@bot.message_handler(commands=['Авторизация'])
def auth(message):
	msg = bot.send_message(message.chat.id, "Введите логин")
	bot.register_next_step_handler(msg, process_login_step)
def process_login_step(message):
		user_login = message.text
		user_id = message.from_user.id
		user_data[user_id] = User(message.text)
		sql = "INSERT INTO user (user_id) VALUES (%s)"
		val = (user_id)
		sql = "SELECT * FROM users WHERE user_id = {0}".format(user_id)
		cursor.execute(sql)
		existsUser = cursor.fetchone()
		markup_inline = types.InlineKeyboardMarkup()
		item_yes = types.InlineKeyboardButton(text = 'ДА', callback_data = 'yes')
		item_no = types.InlineKeyboardButton(text = 'Отмена', callback_data = 'no')

		markup_inline.add(item_yes, item_no)
		bot.send_message(message.chat.id, 'Желаете получить доступ к подаче заявок?',
		reply_markup = markup_inline
		)
@bot.callback_query_handler(func = lambda call: True)
def answer(call):
	if call.data == 'yes':
		markup_reply = types.ReplyKeyboardMarkup(resize_keyboard = True)
		item1 = types.KeyboardButton('/Регистрация')
		item2 = types.KeyboardButton('/Авторизация')
		item3 = types.KeyboardButton('/Сайт')
		item4 = types.KeyboardButton('/Подача заявки')

		markup_reply.add(item1, item2, item3, item4)
		bot.send_message(call.message.chat.id, 'Авторизация завершена, доступ к заявкам получен',
			reply_markup = markup_reply
			)
	elif call.data == 'no':
		pass

@bot.message_handler(commands=['Сайт'])
def site(message):
	bot.reply_to(message, 'Ссылка на сайт:')



bot.enable_save_next_step_handlers(delay=2)

bot.load_next_step_handlers()



bot.polling(none_stop = True, interval = 0)