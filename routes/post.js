//importamos modulos
const Post = require("../models/Post");
const express = require('express');
const router = express.Router();

//configuramos controladores para cada una de las rutas a utilizar por parte de postman
router.post('/', async (req, res) => {
    const newPost = new Post({
        title: req.body.title,
        description: req.body.description
    });
    try{
        const savedPost= await newPost.save();
        res.json(savedPost);
    }catch(error){
        res.json({message:error});
    }
});

router.get('/', async (req, res) => {
    try {
        const posts = await Post.find();
        res.json(posts);
    } catch (error) {
        res.json({ message: error });
    }
});


router.delete('/:postId', async (req, res) => {
    try {
        const removedPost = await Post.deleteOne({ _id: req.params.postId });
        res.json(removedPost);
    } catch (error) {
        res.json({ message: error });
    }
});

router.put('/:postId', async (req, res) => {
    try {
        const updatedPost = await Post.updateOne(
            { _id: req.params.postId },
            { $set: { title: req.body.title, description: req.body.description } }
        );
        res.json(updatedPost);
    } catch (error) {
        res.json({ message: error });
    }
});

router.patch('/:postId',async(req,res)=>{
    try{
        const updatePost=await Post.updateOne(
            {_id:req.params.postId},
            {$set:{title: req.body.title}});
            res.json(updatePost);
    }catch(error){
        res.json({message:error});
    }
});
//exporta el objeto router
module.exports=router;
