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
def start(message):
	people_id = message.chat.id 
	cursor.execute(f"SELECT id_telegramm FROM users WHERE id_telegramm = {people_id}")
	data = cursor.fetchone()
	if data is None:
		msg = bot.send_message(message.chat.id, "Введите ФИО")
		bot.register_next_step_handler(msg, process_name_step)

	cursor.execute(f"SELECT approved FROM users WHERE id_telegramm = {people_id} AND approved = 0")
	approved = cursor.fetchone()
	print (approved)
	if approved is None:
		print (0)
		msg = bot.send_message(message.chat.id, "Аккаунт не подтверждён")
	elif not None:
		msg = bot.send_message(message.chat.id, "Подтверждённый аккаунт")

		markup_inline = types.InlineKeyboardMarkup()
		item_1 = types.InlineKeyboardButton(text = 'Подача заявки', callback_data = '1')
		item_2 = types.InlineKeyboardButton(text = 'Сайт', callback_data = '2')

		markup_inline.add(item_1, item_2)
		bot.send_message(message.chat.id, 'Меню',
		reply_markup = markup_inline
		)

		
		

def process_name_step(message):
	try:
		id_telegramm = message.from_user.id
		user_data[id_telegramm] = User(message.text)

		msg = bot.send_message(message.chat.id, "Введите номер телефона")
		bot.register_next_step_handler(msg, process_phonenumber_step)
	except Exception as e:
		bot.reply_to(message, 'Ошибка')

def process_phonenumber_step(message):
	try:
		id_telegramm = message.from_user.id
		user= user_data[id_telegramm]
		if message.text.isnumeric():
			user.phonenumber = message.text 
			msg = bot.send_message(message.chat.id, "Введите номер участка")
			bot.register_next_step_handler(msg, process_lotnumber_step)
		else:
			msg = bot.send_message(message.chat.id, "Ошибка ввода")
			bot.send_message(message.chat.id, 'Повторите попытку (вводите только цифры)')
			bot.register_next_step_handler(msg, process_phonenumber_step)
	except Exception as e:
		bot.reply_to(message, 'Ошибка')
			

def process_lotnumber_step(message):
	try:
		id_telegramm = message.from_user.id
		user = user_data[id_telegramm]
		user.lotnumber = message.text

		sql = "INSERT INTO users (name, phone_number, lot_number, id_telegramm, approved) VALUES (%s, %s, %s, %s, NULL)"
		val = (user.name, user.phonenumber, user.lotnumber, id_telegramm)
		cursor.execute(sql, val)
		db.commit()

		bot.send_message(message.chat.id, "Регистрация завершена, ожидайте подтверждения учётной записи")
		markup_inline = types.InlineKeyboardMarkup()
		item_1 = types.InlineKeyboardButton(text = 'Подача заявки', callback_data = '1')
		item_2 = types.InlineKeyboardButton(text = 'Сайт', callback_data = '2')

		markup_inline.add(item_1, item_2)
		bot.send_message(message.chat.id, 'Меню',
		reply_markup = markup_inline
		)
		
			
	except Exception as e:
		bot.reply_to(message, 'Ошибка или вы уже зарегистрированы')
	
		markup_inline = types.InlineKeyboardMarkup()
		item_1 = types.InlineKeyboardButton(text = 'Подача заявки', callback_data = '1')
		item_2 = types.InlineKeyboardButton(text = 'Сайт', callback_data = '2')

		markup_inline.add(item_1, item_2)
		bot.send_message(message.chat.id, 'Меню',
		reply_markup = markup_inline
		)

@bot.callback_query_handler(func = lambda call: True)
def answer(call):
	if call.data == '1':
			msg = bot.send_message(call.from_user.id, "Введите номер автомобиля")
			bot.register_next_step_handler(msg, process_numcar_step)
	elif call.data == '2':
		pass
def process_numcar_step(message):
	Car.numcar = message.text
	people_id = message.chat.id 
	
	cursor.execute(f"SELECT approved FROM users WHERE id_telegramm = {people_id} AND approved = 0")
	approved = cursor.fetchone()
	print (approved)
	if approved is None:
		print(0)
		msg = bot.send_message(message.chat.id, "Аккаунт не подтверждён")
	elif not None:
		print(1)
		msg = bot.send_message(message.chat.id, "Аккаунт подтверждён")
		msg = bot.send_message(message.chat.id, "Введите дополнительную информацию")
		bot.register_next_step_handler(msg, process_addinfo_step)
def process_addinfo_step(message):
	try:
		Car.addinfo = message.text

		msg = bot.send_message(message.chat.id, "Введите дату в форме <0000-00-00 00:00:00>")
		bot.register_next_step_handler(msg, process_address_step)
	except Exception as e:
		bot.reply_to(message, 'Ошибка')
def process_address_step(message):
	try:
		Car.datatime = message.text
		
		msg = bot.send_message(message.chat.id, "Введите комментарий")
		bot.register_next_step_handler(msg, process_sendreg_step)
	except Exception as e:
		bot.reply_to(message, 'Ошибка')
def process_sendreg_step(message):
	try:
		Car.comment = message.text
		people_id = message.chat.id

		cursor.execute(f"SELECT name FROM users WHERE id_telegramm = {people_id}")
		sql2 = cursor.fetchone()
		cursor.execute(f"SELECT phone_number FROM users WHERE id_telegramm = {people_id}")
		sql3 = cursor.fetchone()
		cursor.execute(f"SELECT lot_number FROM users WHERE id_telegramm = {people_id}")
		lotnumber = cursor.fetchone()
		sql = "INSERT INTO reg_car (id_user, num_car, add_info, data_time, comment) VALUES (%s, %s, %s, %s, %s)"
		val2 = (people_id, Car.numcar, Car.addinfo, Car.datatime,Car.comment)
		cursor.execute( sql, val2)
		sql4 = "UPDATE reg_car SET full_name = %s"
		val3 = (sql2)
		cursor.execute(sql4, val3)
		sql5 = "UPDATE reg_car SET phone_numbers = %s"
		val4 = (sql3)
		cursor.execute(sql5, val4)
		sql6 = "UPDATE reg_car SET address = %s"
		val5 = (lotnumber)
		cursor.execute(sql6, val5)
		db.commit()

		bot.send_message(message.chat.id, "Ваша заявка принята")
		
			
	except Exception as e:
		bot.reply_to(message, 'Ошибка подачи заявки')
		
	markup_inline = types.InlineKeyboardMarkup()
	item_1 = types.InlineKeyboardButton(text = 'Подача заявки', callback_data = '1')
	item_2 = types.InlineKeyboardButton(text = 'Сайт', callback_data = '2')

	markup_inline.add(item_1, item_2)
	bot.send_message(message.chat.id, 'Меню',
	reply_markup = markup_inline
	)






bot.enable_save_next_step_handlers(delay=2)

bot.load_next_step_handlers()



bot.polling(none_stop = True, interval = 0)
