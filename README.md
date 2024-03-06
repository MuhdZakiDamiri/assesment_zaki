[ASSESMENT.postman_collection.json](https://github.com/MuhdZakiDamiri/assesment_zaki/files/14515103/ASSESMENT.postman_collection.json)# K-production-assessment
 This is assessment fot K-production

# Project info : 
    - Run on php 8.1
    - This is meant for Assessment only

## How to run this project? :
    - Clone this repo
    - Run composer install
    - Make sure to use PHP 8.1 (laragon / xampp / valet)
    - I already include a migration and seeder inside this repo
        # You may run < php artisan migrate > on your terminal 
            # if you encountered an error where the database is not exist
            # you may create the schema manually on your local and then run the migration again
        # You also may run < php artisan db:seed > to generate a dummy data
    - use postman to do the action (postman collection is provided below)
    

### WHAT CAN YOU DO INSIDE THIS REPO? :
    - Manage User
        - create a user
        - update a user
        - delete a user
        - view a user (with / without filter)
        - view all users
        
    - Manage departments
        - create a department
        - update a department
        - delete a department
        - view all department (with / without filter)
        

# POSTMAN
    - link : 
    https://galactic-crater-230916.postman.co/workspace/My-Workspace~d5282ea6-202e-4313-8cf6-cbe35cf51d4d/collection/33084659-ae065515-5589-43c1-a128-6272acf2a12d?action=share&source=collection_link&creator=33084659


    # COLLECTION JSON : 
            [Uploading ASSESME{
        	"info": {
        		"_postman_id": "ae065515-5589-43c1-a128-6272acf2a12d",
        		"name": "ASSESMENT",
        		"schema": "https://schema.getpostman.com/json/collection/v2.1.0/collection.json",
        		"_exporter_id": "33084659",
        		"_collection_link": "https://galactic-crater-230916.postman.co/workspace/My-Workspace~d5282ea6-202e-4313-8cf6-cbe35cf51d4d/collection/33084659-ae065515-5589-43c1-a128-6272acf2a12d?action=share&source=collection_link&creator=33084659"
        	},
        	"item": [
        		{
        			"name": "USER",
        			"item": [
        				{
        					"name": "Get all user",
        					"request": {
        						"method": "GET",
        						"header": [],
        						"url": {
        							"raw": "http://assesment_zaki.test/api/user?department_id=1",
        							"protocol": "http",
        							"host": [
        								"assesment_zaki",
        								"test"
        							],
        							"path": [
        								"api",
        								"user"
        							],
        							"query": [
        								{
        									"key": "search",
        									"value": "zaki",
        									"disabled": true
        								},
        								{
        									"key": "department_id",
        									"value": "1"
        								}
        							]
        						}
        					},
        					"response": []
        				},
        				{
        					"name": "Get user by ID",
        					"request": {
        						"method": "GET",
        						"header": [],
        						"url": {
        							"raw": "http://assesment_zaki.test/api/user/:id",
        							"protocol": "http",
        							"host": [
        								"assesment_zaki",
        								"test"
        							],
        							"path": [
        								"api",
        								"user",
        								":id"
        							],
        							"variable": [
        								{
        									"key": "id",
        									"value": "3"
        								}
        							]
        						}
        					},
        					"response": []
        				},
        				{
        					"name": "Create new user",
        					"request": {
        						"method": "POST",
        						"header": [],
        						"body": {
        							"mode": "raw",
        							"raw": "{\n    \"name\": \"Nizam\",\n    \"email\": \"nizam@gmail.com\",\n    \"phone_num\": \"0152673890\",\n    \"department_id\": 1\n}",
        							"options": {
        								"raw": {
        									"language": "json"
        								}
        							}
        						},
        						"url": {
        							"raw": "http://assesment_zaki.test/api/user",
        							"protocol": "http",
        							"host": [
        								"assesment_zaki",
        								"test"
        							],
        							"path": [
        								"api",
        								"user"
        							]
        						}
        					},
        					"response": []
        				},
        				{
        					"name": "Update User",
        					"request": {
        						"method": "PUT",
        						"header": [],
        						"body": {
        							"mode": "raw",
        							"raw": "{\n    \"name\": \"Nizam\",\n    \"email\": \"nizam@gmail.com\",\n    \"phone_num\": \"0152673890\",\n    \"department_id\": 2\n}",
        							"options": {
        								"raw": {
        									"language": "json"
        								}
        							}
        						},
        						"url": {
        							"raw": "http://assesment_zaki.test/api/user/:id",
        							"protocol": "http",
        							"host": [
        								"assesment_zaki",
        								"test"
        							],
        							"path": [
        								"api",
        								"user",
        								":id"
        							],
        							"variable": [
        								{
        									"key": "id",
        									"value": "3"
        								}
        							]
        						}
        					},
        					"response": []
        				},
        				{
        					"name": "delete user",
        					"request": {
        						"method": "DELETE",
        						"header": [],
        						"url": {
        							"raw": "http://assesment_zaki.test/api/user/:id",
        							"protocol": "http",
        							"host": [
        								"assesment_zaki",
        								"test"
        							],
        							"path": [
        								"api",
        								"user",
        								":id"
        							],
        							"variable": [
        								{
        									"key": "id",
        									"value": "3"
        								}
        							]
        						}
        					},
        					"response": []
        				}
        			]
        		},
        		{
        			"name": "DEPARTMENT",
        			"item": [
        				{
        					"name": "get all department",
        					"request": {
        						"method": "GET",
        						"header": [],
        						"url": {
        							"raw": "http://assesment_zaki.test/api/department",
        							"protocol": "http",
        							"host": [
        								"assesment_zaki",
        								"test"
        							],
        							"path": [
        								"api",
        								"department"
        							]
        						}
        					},
        					"response": []
        				},
        				{
        					"name": "create new department",
        					"request": {
        						"method": "POST",
        						"header": [],
        						"body": {
        							"mode": "raw",
        							"raw": "{\n    \"name\": \"Accounting\"\n}",
        							"options": {
        								"raw": {
        									"language": "json"
        								}
        							}
        						},
        						"url": {
        							"raw": "http://assesment_zaki.test/api/department",
        							"protocol": "http",
        							"host": [
        								"assesment_zaki",
        								"test"
        							],
        							"path": [
        								"api",
        								"department"
        							]
        						}
        					},
        					"response": []
        				},
        				{
        					"name": "delete department",
        					"request": {
        						"method": "DELETE",
        						"header": [],
        						"url": {
        							"raw": "http://assesment_zaki.test/api/department/:id",
        							"protocol": "http",
        							"host": [
        								"assesment_zaki",
        								"test"
        							],
        							"path": [
        								"api",
        								"department",
        								":id"
        							],
        							"variable": [
        								{
        									"key": "id",
        									"value": "3"
        								}
        							]
        						}
        					},
        					"response": []
        				},
        				{
        					"name": "update department",
        					"request": {
        						"method": "PUT",
        						"header": [],
        						"body": {
        							"mode": "raw",
        							"raw": "{\n    \"name\": \"Accounting KL\"\n}",
        							"options": {
        								"raw": {
        									"language": "json"
        								}
        							}
        						},
        						"url": {
        							"raw": "http://assesment_zaki.test/api/department/:id",
        							"protocol": "http",
        							"host": [
        								"assesment_zaki",
        								"test"
        							],
        							"path": [
        								"api",
        								"department",
        								":id"
        							],
        							"variable": [
        								{
        									"key": "id",
        									"value": "4"
        								}
        							]
        						}
        					},
        					"response": []
        				}
        			]
        		}
        	]
        }NT.postman_collection.json…]()


    
