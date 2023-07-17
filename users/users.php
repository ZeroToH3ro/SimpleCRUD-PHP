<?php

use JetBrains\PhpStorm\NoReturn;

/**
 * @throws JsonException
 */
function getUsers()
{
    return json_decode(file_get_contents(__DIR__ . '/users.json'), true, 512, JSON_THROW_ON_ERROR);
}

/**
 * @throws JsonException
 */
function getUserById($id)
{
    $users = getUsers();

    foreach ($users as $user) {
        if ($user['id'] == $id) {
            return $user;
        }
    }
    return null;
}

/**
 * @throws JsonException
 */
function createUser($data)
{
    $users = getUsers();
    $data['id'] = rand(1000,2000);
    $users[] = $data;
    putJson($users);
    return $data;
}

/**
 * @throws JsonException
 */
function updateUser($data, $id): array
{
    $updateUser = [];
    $users = getUsers();
    foreach ($users as $i => $user) {
        if ($user['id'] == $id) {
            $users[$i] = $updateUser = array_merge($user, $data);
        }
    }

    putJson($users);

    return $updateUser;
}

/**
 * @throws JsonException
 */
function uploadImage($file, $user): void
{
    if(isset($_FILES['picture']['name'])){
        if (!is_dir(__DIR__ . '/images')) {
            mkdir(__DIR__ . "/images");
        }
        //Get the file extension from the filename
        $fileName = $file['name'];
        //Find the position of dot in the filename
        $dotPosition = strpos($fileName, '.');
        //Get the type of picture
        $extension = substr($fileName, $dotPosition + 1);
        move_uploaded_file($file['tmp_name'], __DIR__ . "/images/{$user['id']}.$extension");
        //Update user
        $user['extension'] = $extension;
        updateUser($user, $user['id']);
    }
}

/**
 * @throws JsonException
 */
function deleteUser($id)
{
    $users = getUsers();

    foreach($users as $i => $user){
        if($user['id'] == $id){
            array_splice($users, $i, 1);
        }
    }

    putJson($users);
}

function putJson($users): void{
    file_put_contents(__DIR__ . '/users.json', json_encode($users, JSON_THROW_ON_ERROR | JSON_PRETTY_PRINT));
}
