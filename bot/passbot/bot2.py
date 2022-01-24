import telebot
import configure
import mysql.connector
import datetime
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
	if approved is None:
		pass
	elif not None:

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
			msg = bot.send_message(call.from_user.id, "Введите информацию об автомобиле (Номер автомобиля *пробел* марка автомобиля")
			bot.register_next_step_handler(msg, process_numcar_step)
	elif call.data == '2':
		pass
def process_numcar_step(message):
	Car.numcar = message.text
	people_id = message.chat.id 
	Car.numcar=Car.numcar.strip().split(" ")
	cursor.execute(f"SELECT approved FROM users WHERE id_telegramm = {people_id} AND approved = 0")
	approved = cursor.fetchone()
	if approved is None:
		
		msg = bot.send_message(message.chat.id, "Аккаунт не подтверждён")
		markup_inline = types.InlineKeyboardMarkup()
		item_1 = types.InlineKeyboardButton(text = 'Подача заявки', callback_data = '1')
		item_2 = types.InlineKeyboardButton(text = 'Сайт', callback_data = '2')

		markup_inline.add(item_1, item_2)
		bot.send_message(message.chat.id, 'Меню',
		reply_markup = markup_inline
		)
	elif not None:	
		try:

			d = {}
			for i,j in enumerate(Car.numcar,1):
			    d["string{0}".format(i)]=j 
		except:
			msg = bot.send_message(call.from_user.id, "Что-то пошло не так, повторите попытку ввода")
			bot.register_next_step_handler(msg, process_numcar_step)
	 
		
		people_id = message.chat.id
		datanow = datetime.datetime.now()
	try:
		cursor.execute(f"SELECT name FROM users WHERE id_telegramm = {people_id}")
		sql2 = cursor.fetchone()
		cursor.execute(f"SELECT phone_number FROM users WHERE id_telegramm = {people_id}")
		sql3 = cursor.fetchone()
		cursor.execute(f"SELECT lot_number FROM users WHERE id_telegramm = {people_id}")
		lotnumber = cursor.fetchone()
		sql = "INSERT INTO reg_car (id_user, num_car, add_info, data_time, comment) VALUES (%s, %s, %s, %s, NULL)"
		val2 = (people_id, Car.numcar[0], Car.numcar[1], datanow,)
		print (val2)
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