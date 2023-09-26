//aparte de agregar los modulos se define que es lo que se va a agregar directamente a la tabla un titulo 
//y una descripcion en este caso
const mongoose=require('mongoose');
const PostSchema=mongoose.Schema({
    title:{
        type:String,
        require:true
    },
    description:{
        type: String,
        require:true
    },
    date:{
        type:Date,
        default:Date.now
    }
});
module.exports=mongoose.model('post',PostSchema);