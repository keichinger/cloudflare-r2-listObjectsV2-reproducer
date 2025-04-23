<?php
require_once dirname(__DIR__) . '/vendor/autoload.php';

$bucketName = "<bucket_name>";
$accountId = "<account_id>";
$accessKeyId = "<access_key_id>";
$accessKeySecret = "<access_key_secret>";

$client = new Aws\S3\S3Client([
	"region" => "auto",
	"endpoint" => "https://$accountId.eu.r2.cloudflarestorage.com",
	"version" => "latest",
	"credentials" => new Aws\Credentials\Credentials(
		key: $accessKeyId,
		secret: $accessKeySecret,
		accountId: $accountId,
	),

	"use_path_style_endpoint" => true,
	"bucket_endpoint" => true,
	"request_checksum_calculation" => "when_required",
	"response_checksum_validation" => "when_required",
]);

// This one will fail with an HTTP 501 Not Implemented exception
$contents = $client->listObjectsV2([
	"Bucket" => $bucketName
]);
var_dump($contents["Contents"]);

$buckets = $client->listBuckets();
var_dump($buckets["Buckets"]);
