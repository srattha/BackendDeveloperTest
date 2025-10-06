# 🛍️ Laravel Product Review API

ระบบตัวอย่างสำหรับแสดงสินค้า (Product Listing) พร้อมระบบสมาชิก (User System)  
และให้สมาชิกสามารถเขียนรีวิวสินค้า (Review System) ได้ไม่จำกัดจำนวนครั้ง  
สร้างด้วย **Laravel Framework + MySQL** โดยยึดตามหลัก **MVC Pattern**

---

## 🚀 Features

- สมัครสมาชิก / เข้าสู่ระบบ (Authentication)
- เพิ่ม / ดู / แก้ไข / ลบ สินค้า
- เขียนรีวิวสินค้าได้ไม่จำกัด
- ดูรีวิวทั้งหมดของสินค้าแต่ละตัว
- ดูรีวิวทั้งหมดของสมาชิกแต่ละคน

---

## 🧰 Tech Stack

| Category | Tool / Library |
|-----------|----------------|
| Backend Framework | Laravel 12 
| Database | MySQL |
| Authentication | Laravel Sanctum |
| ORM | Eloquent ORM |
| API Testing | Postman |

Mockup APIs (ตัวอย่างทั้งหมด)

Register (สมัครสมาชิก)
Method: POST
URL: /api/register
Request:
json
{
  "name": "",
  "email": "",
  "password": ""
}
Response:
{
    "status": "success",
    "message": "User registered successfully",
    "data": { }
}

Login (เข้าสู่ระบบ)
Method: POST
URL: /api/login
Request:
{
  "email": "",
  "password": ""
}
Response:
{
    "status": "success",
    "message": "Login successful",
    "token": "",
    "user": { }
}


Add Product (เพิ่มสินค้า)
Method: POST
URL: /api/products
Request:
{
  "name": "",
  "description": "",
  "price": ""
}
Response:
{
   "status": "success",
    "message": "Product created successfully",
    "data": { }
}

Get All Products (ดูรายการสินค้า)
Method: GET
URL: /api/products
Response:
{
    "status": "success",
    "data": []
}

Get Product Detail (ดูรายละเอียดสินค้า + รีวิว)
Method: GET
URL: /api/products/{id}
Response:
{
    "status": "success",
    "data": {}
}

Update Product (แก้ไขสินค้า)
Method: PUT
URL: /api/products/{id}
Request:
{
  "name": "",
  "description": "",
  "price": ""
}
Response:
{
    "status": "success",
    "message": "Product updated successfully",
    "data": { }
}


Delete Product  (ลบสินค้า)
Method: DELETE
URL: /api/products/{id}
Response:
{
    "status": "success",
    "message": "Product deleted successfully"
}

Add Review (เพิ่มรีวิวสินค้า)
Method: POST
URL: /api/products/{productId}/reviews
Request:
{
  "rating": ,
  "comment": ""
}

Response:
{
    "status": "success",
    "message": "Review added successfully",
    "data": {}
}


Get Product Reviews (ดูรีวิวของสินค้า)
Method: GET
URL: /api/products/{productId}/reviews
Response:
{
    "status": "success",
    "data": []
}


Get User Reviews (ดูรีวิวของสมาชิก)
Method: GET
URL: /api/users/{userId}/reviews
Response:
{
    "status": "success",
    "data": []
}

