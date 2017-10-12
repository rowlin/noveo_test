#Subject:
Create an API which allow users and groups management
Out of scope: authentication, and roles management; forms and views

##User Stories:
- I want to create a user who is included in a group
- I want to check if this user exits and is active (?)
- I want to modify the list of users of a group

#Entities:

- User: email, last name, first name, state (active/ non active),creation date

- Group: name


#API methods:
- /users/ fetch(retrieve) list of users
- /users/ create a user
- /users/id/ fetch info of a user
- /users/id/modify users info
- /groups/ fetch list of groups
- /groups/create a group
- /groups/id/modify group info


#Bonus:
- to perform a functional test ( only hand test )
- add validation constraints/rules

#Framework:  Laravel 


To generate users and groups you can use command php artisan db::seed 


#Examples :


To generate users and groups you can use command php artisan db::seed 

// to show user list
$ curl -H 'content-type: application/json' -X GET 'http://*domain*/users'

{"code":400,"message":"Users not found"}

$ curl -H 'content-type: application/json' -X GET 'http://*domain*/users'

```json

[{"id":1,"first_name":"Jaan","last_name":"Petrik","state":0,"email":"rowlinest90@gmail.com","created_at":"2017-10-11 21:56:47","updated_at":"2017-10-11 21:56:47"},{"id":2,"first_name":"Alice","last_name":"Deep","state":0,"email":"admin@admin.com","created_at":"2017-10-11 21:56:47","updated_at":"2017-10-11 21:56:47"},{"id":3,"first_name":"Ded","last_name":"Alone","state":0,"email":"ded_alone@gmail.com","created_at":"2017-10-11 21:56:47","updated_at":"2017-10-11 21:56:47"}]

```

// to show a user info 

$ curl -H 'content-type: application/json' -X GET 'http://*domain*/users/2'

```json
{"id":2,"first_name":"Tsis","last_name":"poopw","state":0,"email":"test1@test222.ru","created_at":"2017-10-11 23:23:51","updated_at":"2017-10-12 01:22:41"}
```

//to modify user info

$ curl -H 'content-type: application/json' -X PUT "http://*domain*/users/2" -d '{"first_name":"Tsss","last_name":"last_name","email": "test1@test.ru"}'
```json
{"id":2,"first_name":"Tsis","last_name":"poopw","state":0,"email":"test1@test222.ru","created_at":"2017-10-11 23:23:51","updated_at":"2017-10-12 01:22:41"}
```

//show all groups

curl -H 'content-type: application/json' -X GET 'http://*domain*/groups'


//create new group

$ curl -H 'content-type: application/json' -X POST "http://*domain*/groups/create" -d '{"name":"Tss"}'

//modify info about a group

curl -H 'content-type: application/json' -X PUT "http://*domain*/groups/2" -d '{"name":"named_changed"}'


#Ps:




В задании указано использование только Api (Out of scope: authentication, and roles management; forms and views)
Не совсем понятен пункт - I want to check if this user exits and is active (вернее как его реализовать) 
Можно проверить пользователя на активность, если он авторизован в системе - имеет куки/сессию...
Можно добавить в api  middleware = \Illuminate\Session\Middleware\StartSession::class
- но как судить о том что именно этот пользователь активен, ведь authentication out of scope ?   



