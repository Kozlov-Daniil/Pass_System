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
		msg = bot.send_message(message.chat.id, "Введите ФИО, номер телефона и номер участка (каждое поле через точку)")
		bot.register_next_step_handler(msg, process_name_step)

	else:
		cursor.execute(f"SELECT approved FROM users WHERE id_telegramm = {people_id} AND approved = 0")
		approved = cursor.fetchone()
		if approved is None:
			bot.send_message(message.chat.id, "Ожидайте подтверждения аккаунта")
			markup_inline = types.InlineKeyboardMarkup()
			item_1 = types.InlineKeyboardButton(text = 'Подача заявки', callback_data = '1')
			item_2 = types.InlineKeyboardButton(text = 'Сайт', callback_data = '2')

			markup_inline.add(item_1, item_2)
			bot.send_message(message.chat.id, 'Меню',
			reply_markup = markup_inline
			)
			db.commit()	
		else:

			markup_inline = types.InlineKeyboardMarkup()
			item_1 = types.InlineKeyboardButton(text = 'Подача заявки', callback_data = '1')
			item_2 = types.InlineKeyboardButton(text = 'Сайт', callback_data = '2')

			markup_inline.add(item_1, item_2)
			bot.send_message(message.chat.id, 'Меню',
			reply_markup = markup_inline
			)

		
def process_name_step(message):
	id_telegramm = message.from_user.id
	user_data[id_telegramm] = User(message.text)
	name = message.text

	name=name.strip().split(".")
	try:
		l=0
		f = {}
		for o,k in enumerate(name,1):
		    f["string{0}".format(o)]=k
		    l+=1

		user = user_data[id_telegramm]
		if l == 3:

			sql = "INSERT INTO users (name, phone_number, lot_number, id_telegramm, approved) VALUES (%s, %s, %s, %s, NULL)"
			val = (name[0], name[1], name[2], id_telegramm)
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
		else:
			msg = bot.send_message(message.chat.id, "Что-то пошло не так, повторите попытку ввода")
			bot.register_next_step_handler(msg, process_name_step)


	except:	
		msg = bot.send_message(message.chat.id, "Что-то пошло не так, повторите попытку ввода")
		bot.register_next_step_handler(msg, start)
			

@bot.callback_query_handler(func = lambda call: True)
def answer(call):
	people_id = call.from_user.id 
	cursor.execute(f"SELECT approved FROM users WHERE id_telegramm = {people_id} AND approved = 0")
	approved = cursor.fetchone()
	if approved is None:
		bot.send_message(call.from_user.id, "Ожидайте подтверждения аккаунта")
		markup_inline = types.InlineKeyboardMarkup()
		item_1 = types.InlineKeyboardButton(text = 'Подача заявки', callback_data = '1')
		item_2 = types.InlineKeyboardButton(text = 'Сайт', callback_data = '2')
		markup_inline.add(item_1, item_2)
		bot.send_message(call.from_user.id, 'Меню',
		reply_markup = markup_inline
		)
		db.commit()	
	else:
		if call.data == '1':
				msg = bot.send_message(call.from_user.id, "Введите информацию об автомобиле (Номер автомобиля *пробел* марка автомобиля")
				bot.register_next_step_handler(msg, process_numcar_step)
		elif call.data == '2':
				msg = bot.send_message(call.from_user.id, "https://site.ru")
				bot.register_next_step_handler(msg, start)
def process_numcar_step(message):
	people_id = message.chat.id 
	Car.numcar = message.text
	Car.numcar=Car.numcar.strip().split(" ")
	cursor.execute(f"SELECT approved FROM users WHERE id_telegramm = {people_id} AND approved = 0")
	approved = cursor.fetchone()

	people_id = message.chat.id 
	Car.numcar = message.text
	Car.numcar=Car.numcar.strip().split(" ")
	cursor.execute(f"SELECT approved FROM users WHERE id_telegramm = {people_id} AND approved = 0")
	approved = cursor.fetchone()
	
	if approved is None:	
		msg = bot.send_message(message.chat.id, "Аккаунт не подтверждён, ожидайте подтверждения")
		markup_inline = types.InlineKeyboardMarkup()
		item_1 = types.InlineKeyboardButton(text = 'Подача заявки', callback_data = '1')
		item_2 = types.InlineKeyboardButton(text = 'Сайт', callback_data = '2')
		markup_inline.add(item_1, item_2)
		bot.send_message(message.chat.id, 'Меню',
		reply_markup = markup_inline
		)
		db.commit()	
	elif not None:	
		try:
			b=0
			d = {}
			for i,j in enumerate(Car.numcar,1):
			    d["string{0}".format(i)]=j 
			    b+=1
		except:
			msg = bot.send_message(message.chat.id, "Что-то пошло не так, повторите попытку ввода")
			bot.register_next_step_handler(msg, answer)
	if b != 2:
		msg = bot.send_message(message.chat.id, "Данные введены неверно, повторите попытку")
		bot.register_next_step_handler(message, process_numcar_step)
	elif b == 2:
		people_id = message.chat.id
		datanow = datetime.datetime.now()
		try:
			cursor.execute(f"SELECT name FROM users WHERE id_telegramm = {people_id}")
			sql2 = cursor.fetchone()
			cursor.execute(f"SELECT phone_number FROM users WHERE id_telegramm = {people_id}")
			sql3 = cursor.fetchone()
			cursor.execute(f"SELECT lot_number FROM users WHERE id_telegramm = {people_id}")
			lotnumber = cursor.fetchone()
			sql = "INSERT INTO reg_car (id_user, num_car, add_info, data_time, comment, status) VALUES (%s, %s, %s, %s, NULL, 'Ожидается')"
			val2 = (people_id, Car.numcar[0], Car.numcar[1], datanow)
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
			markup_inline = types.InlineKeyboardMarkup()
			item_1 = types.InlineKeyboardButton(text = 'Подача заявки', callback_data = '1')
			item_2 = types.InlineKeyboardButton(text = 'Сайт', callback_data = '2')
			markup_inline.add(item_1, item_2)
			bot.send_message(message.chat.id, 'Меню',
			reply_markup = markup_inline
			)

		
		except Exception as e:
			bot.send_message(message.chat.id, "Ошибка отправки данных, повторите ввод")
			bot.register_next_step_handler(message, process__numcar_step)
	

	




bot.enable_save_next_step_handlers(delay=2)
bot.load_next_step_handlers()
bot.polling(none_stop = True, interval = 0)