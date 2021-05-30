<?php

/*
 * built-in function to learn
 *
 * string functions: explode, strlen, strstr, strpos, trim, str_replace
 * file functions: get_file_content, is_file, is_dir, scandir
 * array functions: count, array_push, array_pop, unset, isset, array_keys, array_key_exists, array_slice
 * json functions: json_encode, json_decode
 * constant functions: define
 *
 * callback function: call_user_func
 */
function hello() {
    return "Hello World";
}
echo hello();

function multiple($n1, $n2) {
    return $n1 * $n2;
}
echo multiple(1, 5);
echo multiple(2, 5);
echo multiple(3, 5);

// Function arguments can support default value
