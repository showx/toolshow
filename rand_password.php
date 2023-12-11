<?php

$nonce = random_bytes(SODIUM_CRYPTO_SECRETBOX_NONCEBYTES); // 生成 nonce

// 随机数生成示例
$randomBytes = random_bytes(32); // 生成安全的随机字节

echo $nonce.PHP_EOL;

echo $randomBytes.PHP_EOL;