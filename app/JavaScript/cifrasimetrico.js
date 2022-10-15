function cifrar($ctabancaria, $llave){
    $inicvec = openssl_random_pseudo_bytes(openssl_cipher_iv_lenght('AES-256-CBC'));
    $ctabancariaencrip = openssl_encrypt($ctabancaria, "AES-256-CBC", $llave, 0, $inicvec);
    return base64_encode($ctabancariaencrip);
}

function descifrar($ctabancaria, $llave){
    return openssl_decrypt($datosecrip, "AES-256-CBC", $llave, 0, $inicvec)
} 