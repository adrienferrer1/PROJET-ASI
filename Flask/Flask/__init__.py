from flask import Flask, jsonify
from flask_restful import Api, Resource, reqparse
import mysql.connector


app = Flask(__name__)
api = Api(app)

#cnx = mysql.connector.connect(user='archibook', password='azertyazerty', host='127.0.0.1', database='Archibook')
#cursor = cnx.cursor()

class User(Resource):

	def get(self, name):
		cnx = mysql.connector.connect(user='archibook', password='azertyazerty', host='127.0.0.1', database='Archibook')
		cursor = cnx.cursor()
		sqlq = ("""SELECT COUNT(1) FROM users WHERE name = '%s' """)
		cursor.execute(sqlq%(name))
		if cursor.fetchone()[0]:

			name_query = ("""SELECT name FROM users WHERE name = '%s' """)
			cursor.execute(name_query%(name))
			name = cursor.fetchone()

			lastname_query = ("""SELECT lastname FROM users WHERE name = '%s' """)
			cursor.execute(lastname_query%(name))
			lastname = cursor.fetchone()

			mail_query = ("""SELECT mail FROM users WHERE name = '%s' """)
			cursor.execute(mail_query%(name))
			mail = cursor.fetchone()

			user = {
				"name" : name,
				"lastname" : lastname,
				"mail" : mail,
			}

			return jsonify(user)
		else:
			return "User not found", 404

	def post(self, name):
		cnx = mysql.connector.connect(user='archibook', password='azertyazerty', host='127.0.0.1', database='Archibook')
		cursor = cnx.cursor()
		parser = reqparse.RequestParser()
		parser.add_argument("complete_name")
		parser.add_argument("mail")
		args = parser.parse_args()

		#print(name)

		sqlq = ("""SELECT COUNT(1) FROM users WHERE name = '%s' """)
		cursor.execute(sqlq%(name))
		if cursor.fetchone()[0]:
			print ("User already exists")

		else:
			name = name,
			complete_name = args["complete_name"],
			mail = args["mail"]

			mail = "'" + mail + "'"

			school_com = str(mail).split("@")
			school = school_com[1].split(".")[0]


			user = (name[0], complete_name[0], str(mail), school)
			#print (type(name))

			add_user = ("INSERT INTO users (name, lastname, mail, school) values (%s, %s, %s, %s)")
			cursor.execute(add_user, user)
			cnx.commit()

			return user, 201

	def put(self, name):
		cnx = mysql.connector.connect(user='archibook', password='azertyazerty', host='127.0.0.1', database='Archibook')
		cursor = cnx.cursor()
		parser = reqparse.RequestParser()
		parser.add_argument("complete_name")
		parser.add_argument("mail")
		args = parser.parse_args()

		sqlq = ("""SELECT COUNT(1) FROM users WHERE name = '%s' """)
		cursor.execute(sqlq%(name))
		if cursor.fetchone()[0]:
			print("User exists")
			name = name,
			print(type(name[0]))
			complete_name = args["complete_name"],
			mail = args["mail"]
			mail = "'" + mail + "'"
			query = """ UPDATE users SET name = %s, lastname = %s, mail = %s WHERE name = %s """
			user = (name[0], complete_name[0], str(mail), name[0])
			cursor.execute(query, (user))
			cnx.commit()


			return jsonify(user)


	def delete(self, name):
		global users
		users = [user for user in users if user["name"] != name]
		return "{} is deleted.".format(name), 200


api.add_resource(User, "/user/<string:name>")

if __name__ == '__main__':
    app.run(debug=True)
