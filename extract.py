# -*- coding: utf-8 -*-
import requests
from bs4 import BeautifulSoup
from lxml import etree
import MySQLdb

# to add or update values in DB
def insert_temp_reading(names, courses):
    conn = MySQLdb.connect("localhost", "przemek", "Json123", "pi_base", charset='utf8', use_unicode=True)
    cursor = conn.cursor()
    params = [names, courses]

    try:
        #uncomment that when you need insert values to table
        #cursor.execute("INSERT INTO mo (id,name,course) VALUE (NULL,%s, %s)",params)
        cursor.execute("UPDATE mo SET course=%s WHERE name=%s", params)
        conn.commit()
    except MySQLdb.Error, e:
        print "An error has occurred. %s" % e
    finally:
        cursor.close()
        conn.close()


url = "http://www.nbp.pl/kursy/xml/a048z160310.xml"
r = requests.get(url)
soup = BeautifulSoup(r.content)
g_data = soup.find_all("pozycja")
for item in g_data:
    f, abc = item.text.split("1", 1)
    f = f[1::]
    b = abc[-7::]
    print f
    print b
    insert_temp_reading(f, b)
