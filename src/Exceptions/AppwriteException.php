<?php

namespace NajDias\AppwriteClient\Exceptions;

class AppwriteException extends \RuntimeException
{
    public static function missingApiEndpoint(): self
    {
        return new self('No appwrite endpoint was provided. Make sure to set the `APPWRITE_API_ENDPOINT` environment variable.');
    }

    public static function missingProjectId(): self
    {
        return new self('No appwrite project ID was provided. Make sure to set the `APPWRITE_PROJECT_ID` environment variable.');
    }

    public static function missingApiKey(): self
    {
        return new self('No appwrite API key was provided. Make sure to set the `APPWRITE_API_KEY` environment variable.');
    }
}
