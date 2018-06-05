import ldap
import requests
import json
import urllib.parse



#Initialisation de la connexion au LDAP de test (url et port)
con = ldap.initialize('ldap://localhost:10389')

#Envoi d'une requête BIND au serveur LDAP
con.simple_bind_s("uid=admin,ou=system", "secret")

#Création de la variable ldap_base contenant le DomainComponent du LDAP
ldap_base = "dc=example,dc=com"

#Création de la variable result contenant le résultat de la recherche
result = con.search_s(ldap_base, ldap.SCOPE_SUBTREE)

#print(result[0][1])
#print(result[1])

data_final=[]

for i in range(0,len(result)):
    parse1 = result[i]
    parse2 = parse1[1]

    try:
        name = parse2["sn"]
        complete_name = parse2["cn"]
        mail = parse2["mail"]
        password = parse2["userPassword;lang-fr-FR"]

        name_parsed = name[0]
        complete_name_parsed = complete_name[0]
        mail_parsed = mail[0]
        password_parsed = password[0]

        name_decoded = name_parsed.decode('utf-8')
        complete_name_decoded = complete_name_parsed.decode('utf-8')
        complete_name_decoded_parsed = complete_name_decoded.split(" ", 1)
        first_name = complete_name_decoded_parsed[0]
        mail_decoded = mail_parsed.decode('utf-8')
        password_decoded = password_parsed.decode('utf-8')

        data = { 'name' : name_decoded, 'complete name' : first_name, 'mail' : mail_decoded, 'password' : password_decoded}

        print(data)

		data_final.append(data)

		#Envoi d'une requête POST à l'API (fonctionnant en local sur le port 5000)


	except:
		continue


#print(data_final)

#Envoi d'une requête GET de test pour vérifier la requête POST et impression du résultat
