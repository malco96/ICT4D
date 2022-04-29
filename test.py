import mysql.connector

from mysql.connector import Error

try:
    connection = mysql.connector.connect(host='eu-cdbr-west-02.cleardb.net',
                                         database='heroku_8f7ce219fb9f347',
                                         user='b342abd3b38c6a',
                                         password='cbea95c2')
    if connection.is_connected():
        db_Info = connection.get_server_info()
        print("Connected to MySQL Server version ", db_Info)
        cursor = connection.cursor()
        cursor.execute("select database();")
        record = cursor.fetchone()
        print("You're connected to database: ", record)

        cursor.execute("SELECT * FROM farmer_information")

        myresult = cursor.fetchall()

        for x in myresult:
            print(x)

except Error as e:
    print("Error while connecting to MySQL", e)
finally:
    if connection.is_connected():
        cursor.close()
        connection.close()
        print("MySQL connection is closed")