from aiogram import types, Bot
from dispatcher import dp
import config
import re
from bot import BotDB


@dp.message_handler(commands=['start'])
async def start(message: types.Message):
    markup_inline = types.InlineKeyboardMarkup()
    item_1 = types.InlineKeyboardButton(text = 'Помощь', callback_data = '1')
    markup_inline.add(item_1)
    db_result=BotDB.check_user_exists(message.from_user.id);
    if (db_result is None):
        await message.bot.send_message(message.from_user.id, "Вас приветствует БОТ заказа пропусков!\nДля начала, необходимо зарегистрироваться в системе.\nДля этого введите ФИО, номер телефона и номер участка (через запятую): ")       
    else:
        await message.bot.send_message(message.from_user.id, "Здравствуйте, " + str(db_result[0]) + "\nВас приветствует БОТ заказа пропусков! ")
        if (db_result[5] == 0):
            await message.bot.send_message(message.from_user.id, "Пожалуйста, дождитесь подтверждения регистрации! ")
        if (db_result[5] == 2):
            await message.bot.send_message(message.from_user.id, "К сожалению, Вы временно не можете использовать систему заказа пропусков! ")
        if (db_result[5] == 1):
            await message.bot.send_message(message.from_user.id, "Для заказа пропуска ввердите номер и марку машины! ", reply_markup = markup_inline)

@dp.callback_query_handler(lambda call: True)
async def inline_button1(message: types.Message):   
        db_result=BotDB.check_user_exists(message.from_user.id);
        if (db_result is None):
            await message.bot.send_message( message.from_user.id, "Вас приветствует автоматизированная система заказа пропусков!\n" +
                "Данная система предназначена для простого заказа пропусков с использованием мессенджера Telegram.\n" +
                "Для начала работы, необходимо зарегистрироваться в системе. Для регистрации необходимо ввести Фамилию Имя Отчество, номер Вашего телефона и номер участка, на котором Вы проживаете.\n\n" +
                "Например:\n" + 
                "Иванов Иван Иванович, 89161234567, 777\n\n" +
                "После подтверждения Администратором Вашей регистрации, Вам поступит соответствующее сообщение, после которого Вы сможете заказывать пропуска для машин Ваших гостей для въезда на территорию посёлка.")
        if (db_result[5] == 0):
            await message.bot.send_message( message.from_user.id, "Вас приветствует автоматизированная система заказа пропусков!\n" +
                "Данная система предназначена для простого заказа пропусков с использованием мессенджера Telegram.\n\n" +
                "Для подачи заявки вам необходимо дождаться подтверждения администратором вашей регистрации.\n" + 
                "Вам поступит соответствующее сообщение, после которого вы сможете заказывать пропуска для машин ваших гостей для въезда на территорию посёлка.")
        if (db_result[5] == 1):
            await message.bot.send_message( message.from_user.id, "Вас приветствует автоматизированная система заказа пропусков!\n" +
                "Данная система предназначена для простого заказа пропусков с использованием мессенджера Telegram.\n\n" +
                "Вы являетесь пользователем с подтверждённой регистрацией.\n"+
                "Для заказа пропуска введите номер и марку машины.\n\n"+
                "Напимер:\n"+
                "А111АА BMW")
        if (db_result[5] == 2):
            await message.bot.send_message( message.from_user.id, "Вас приветствует автоматизированная система заказа пропусков!\n" +
                "Данная система предназначена для простого заказа пропусков с использованием мессенджера Telegram.\n\n" +
                "На данный момент ваш аккаунт заблокирован и вы не обладаете возможностью подачи заявки.\n"+
                "Пожалуйста, ожидайте разблокировки аккаунта.")

@dp.message_handler()
async def echo_message(message: types.Message):
    markup_inline = types.InlineKeyboardMarkup()
    item_1 = types.InlineKeyboardButton(text = 'Помощь', callback_data = '1')
    markup_inline.add(item_1)
    db_result=BotDB.check_user_exists(message.from_user.id);
    if (db_result is None):
        # новый пользователь: проверка сообщения на формат фио и т п.
        user_data = message.text
        user_data = user_data.strip().split(",")
        
        if (len(user_data) == 3): # параметров должно быть 3
            phone=check_phone(str(user_data[1]).strip()) # проверка номера телефона
            if(phone is None):
                await message.bot.send_message(message.chat.id, "Неправильно введён номер телефона.\nВведите ФИО, номер телефона и номер участка (через запятую):")
            else:
                num=str(user_data[2]).strip() # проверка номера участка
                if (not num.isnumeric()):
                    await message.bot.send_message(message.chat.id, "Неправильно введён номер участка.\nВведите ФИО, номер телефона и номер участка (через запятую):")
                else:
                    uname=str(user_data[0]).strip() # проверка ФИО
                    if(not re.match(r"^(?=.{1,40}$)[а-яёА-ЯЁ]+(?:[-' ][а-яёА-ЯЁ]+)*$", uname)):
                        await message.bot.send_message(message.chat.id, "Неправильно введёны ФИО.\nВведите ФИО, номер телефона и номер участка (через запятую):")
                    else:
                        if (BotDB.add_user( uname, phone, num, message.from_user.id)): # записываем результат в базу
                            await message.bot.send_message(message.chat.id, "ФИО: " + uname + "\nТелефон: " + phone + "\nНомер участка: " + num + "\n\nРегистрация завершена, ожидайте подтверждения учётной записи", reply_markup = markup_inline)
                        else:
                            await message.bot.send_message(message.chat.id, "Ошибка регистрации, попробуйте повторить попытку позднее")

        # параметров меньше - пусть вводят заного
        else:
            await message.bot.send_message(message.from_user.id, "Неправильный ввод\nВведите ФИО, номер телефона и номер участка (через запятую): ")
    else:
        if (db_result[5] == 0): # ожидает регистрации
            await message.bot.send_message(message.from_user.id, "Пожалуйста, дождитесь подтверждения регистрации! ")
        if (db_result[5] == 2): # бан
            await message.bot.send_message(message.from_user.id, "К сожалению, Вы временно не можете использовать систему заказа пропусков! ")
        if (db_result[5] == 1): # заявки
            # пользователь существует и авторизован, значит ввёл заявку. проверяем правильность заполнения
            user_req = message.text
            user_req = user_req.strip().split(" ")
        
            if (len(user_req) == 2): # параметров должно быть 2
                a_num = user_req[0].strip()
                a_model = user_req[1].strip()
                if (not re.match(r'^\w?(\d{3})(\w{2}(\d{2,3})?)?', a_num)):
                    await message.bot.send_message(message.from_user.id, "Неправильно введён номер автомобиля")
                else:
                    await message.bot.send_message(message.from_user.id, "Номер: " + a_num + "\nМарка: " + a_model + "\n\nЗаявка принята")
            else:
                # заявка заполнена не правильно - предупреждение
                await message.bot.send_message(message.from_user.id, "Неправильный ввод\nДля заказа пропуска ввердите номер и марку машины! ")


def check_phone( text ):
    if(not re.match(r'^((8|\+7)[\- ]?)(\(?\d{3}\)?[\- ]?)?[\d\- ]{7,10}$', text)):
        return None
    else:
        list1 = re.findall(r'\d', text)
        list1 = ''.join(list1)
        if len(list1) == 10:
            result = re.sub(r'(\d{3})(\d{3})(\d{2})(\d{2})', r'+7 \1 \2-\3-\4', list1)
        else:
            result = re.sub(r'(\d)(\d{3})(\d{3})(\d{2})(\d{2})', r'+7 \2 \3-\4-\5', list1)
        return result
