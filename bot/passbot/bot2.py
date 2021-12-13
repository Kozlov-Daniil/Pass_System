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

	markup_inline = types.InlineKeyboardMarkup()
	item_1 = types.InlineKeyboardButton(text = 'Регистрация', callback_data = '1')
	item_2 = types.InlineKeyboardButton(text = 'Подача заявки', callback_data = '2')
	item_3 = types.InlineKeyboardButton(text = 'Сайт', callback_data = '3')

	markup_inline.add(item_1, item_2, item_3)
	bot.send_message(message.chat.id, 'Для подачи заявки вам необходимо зарегистрироваться.',
	reply_markup = markup_inline
	)
@bot.callback_query_handler(func = lambda call: True)
def answer(call):
	if call.data == '1':
		msg = bot.send_message(call.message.chat.id, "Введите ФИО")
		bot.register_next_step_handler(msg, process_name_step)
	elif call.data == '2':
		msg = bot.send_message(call.message.chat.id, "В разработке...")
	else:
		msg = bot.send_message(call.message.chat.id, "Ссылка на сайт:")
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
		
	except Exception as e:
		bot.reply_to(message, 'Ошибка или вы уже зарегистрированы')

	markup_inline = types.InlineKeyboardMarkup()
	item_1 = types.InlineKeyboardButton(text = 'Регистрация', callback_data = '1')
	item_2 = types.InlineKeyboardButton(text = 'Подача заявки', callback_data = '2')
	item_3 = types.InlineKeyboardButton(text = 'Сайт', callback_data = '3')

	markup_inline.add(item_1, item_2, item_3)
	bot.send_message(message.chat.id, 'Меню',
	reply_markup = markup_inline
	)



bot.enable_save_next_step_handlers(delay=2)

bot.load_next_step_handlers()



bot.polling(none_stop = True, interval = 0)
