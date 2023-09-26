// Importamos los módulos necesarios
const express = require('express');
const mongoose = require('mongoose');
const bodyParser = require('body-parser');
const postRoutes = require('./routes/post'); 

const app = express();

app.use(bodyParser.json());
app.use('/posts', postRoutes);

app.get('/', (req, res) => {
    res.send('Prueba 1');
});

// Función para conectar a la base de datos MongoDB
async function connectToDatabase() {
    try {
        await mongoose.connect('mongodb+srv://correaaullonyesid:EqJ2iJNq5OIIhk7A@cluster0.85ncwba.mongodb.net/?retryWrites=true&w=majority', {
            useNewUrlParser: true,
            useUnifiedTopology: true
        });
        console.log('Connected to MongoDB');
        app.listen(1000);
    } catch (error) {
        console.error('Error connecting to MongoDB:', error);
    }
}

connectToDatabase();
