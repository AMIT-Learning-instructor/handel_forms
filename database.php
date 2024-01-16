<?php

    $conn = mysqli_connect('localhost','root','','news');
    if (!$conn){
        die("ERROR in connection ");
    }

    function getBlogs(){
        // global $conn;
        $sql = 'SELECT b.id, b.title ,b.short_description, a.name FROM `blogs` as b INNER JOIN authors as a on b.author_id = a.id  order by created_at DESC';
        $result = mysqli_execute_query($GLOBALS['conn'],$sql);
        return $result;
    }

    function getBlog($id){
        // global $conn;
        $sql = 'SELECT b.id, b.title ,b.content, b.created_at, a.name FROM `blogs` as b INNER JOIN authors as a on b.author_id = a.id where b.id = ?;';
        $result = mysqli_execute_query($GLOBALS['conn'],$sql,[$id]);
        $row = mysqli_fetch_assoc($result);
        return $row;
    }

    function getAuthors(){
        // global $conn;
        $sql = 'SELECT a.id , a.name FROM authors as a;';
        $result = mysqli_execute_query($GLOBALS['conn'],$sql);
        return $result;
    }

    function insertPost($title,$short_description,$content,$author_id){
        $sql = 'INSERT INTO blogs (title,short_description,content,author_id) VALUES (?,?,?,?)';
        $result = mysqli_execute_query($GLOBALS['conn'],$sql,[$title,$short_description,$content,$author_id]);
        return $result;
    }

    // mysqli_close($conn);

