const express = require("express");
const mongoose = require("mongoose");
const multer = require("multer");
const path = require("path");

const app = express();

app.set("view engine", "ejs");
app.use(express.urlencoded({ extended: false }));
app.use(express.static("Images"));

const PORT = 8000;
var FileName = "";

//#region MongoDB

mongoose.connect("mongodb://localhost:27017/Practical");

const ProductSchema = mongoose.Schema({
    Name: String,
    Image: String,
    Price: Number,
    Quantity: Number
});

const ProductModel = mongoose.model("Product", ProductSchema);

//#endregion MongoDB

//#region File Upload

const FileOption = multer.diskStorage({
    destination: "./Images",
    filename: (request, file, callback) => {
        FileName = Date.now() + path.extname(file.originalname);
        console.log(FileName);
        return callback(null, FileName);
    }
})

const FileUpload = multer({ storage: FileOption });

//#endregion File Upload

//app.use(express.urlencoded());

app.get("/", (request, response) => {
    ProductModel.find((error, data) => {
        response.render("index", { Products: data });
    });
});

app.post("/", FileUpload.single("ProductImage"), (request, response) => {
    new ProductModel({
        Name: request.body.ProductName,
        Image: FileName,
        Price: request.body.Price,
        Quantity: request.body.Quantity
    }).save();
    
    response.redirect("/");
});

app.listen(PORT);
console.log("app listen on http://localhost:" + PORT + "/");