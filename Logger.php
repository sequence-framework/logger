<?php

declare(strict_types = 1);

use Monolog\Logger as Monolog;
use Monolog\Handler\StreamHandler;
use Sequence\Logger\Singleton;

class Logger extends Singleton
{

    protected Monolog $logger;

    protected string $logPath;

    protected function __construct()
    {
        parent::__construct();
        $this->logPath = __DIR__.'/logs/sequence.log';
        $this->logger = new Monolog('sequence_logger');
    }

    public static function info(Stringable $message, array $context = [])
    {
        $self = static::getInstance();
        $self->logger->pushHandler(new StreamHandler($self->logPath, Monolog::INFO));
        $self->logger->info($message, $context);
    }

    public static function debug(Stringable $message, array $context = [])
    {
        $self = static::getInstance();
        $self->logger->pushHandler(new StreamHandler($self->logPath, Monolog::DEBUG));
        $self->logger->debug($message, $context);
    }

    public static function error(Stringable $message, array $context = [])
    {
        $self = static::getInstance();
        $self->logger->pushHandler(new StreamHandler($self->logPath, Monolog::ERROR));
        $self->logger->error($message, $context);
    }

    public static function alert(Stringable $message, array $context = [])
    {
        $self = static::getInstance();
        $self->logger->pushHandler(new StreamHandler($self->logPath, Monolog::ALERT));
        $self->logger->alert($message, $context);
    }

    public static function emergency(Stringable $message, array $context = [])
    {
        $self = static::getInstance();
        $self->logger->pushHandler(new StreamHandler($self->logPath, Monolog::EMERGENCY));
        $self->logger->emergency($message, $context);
    }

    public static function notice(Stringable $message, array $context = [])
    {
        $self = static::getInstance();
        $self->logger->pushHandler(new StreamHandler($self->logPath, Monolog::NOTICE));
        $self->logger->notice($message, $context);
    }

    public static function warning(Stringable $message, array $context = [])
    {
        $self = static::getInstance();
        $self->logger->pushHandler(new StreamHandler($self->logPath, Monolog::WARNING));
        $self->logger->warning($message, $context);
    }

}