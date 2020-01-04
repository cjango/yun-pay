<?php

namespace AsLong\YunPay\Notify;

use Closure;
use Exception;

class Paid
{

    const SUCCESS = 'success';
    const FAIL    = 'failed';

    /**
     * @var
     */
    protected $app;

    /**
     * @var array
     */
    protected $message;

    /**
     * @var string|null
     */
    protected $fail;

    public function __construct($app)
    {
        $this->app = $app;
    }

    public function handle(Closure $closure)
    {
        $this->strict(
            \call_user_func($closure, $this->getMessage(), [$this, 'fail'])
        );

        return $this->toResponse();
    }

    protected function toResponse()
    {
        return is_null($this->fail) ? static::SUCCESS : static::FAIL;
    }

    /**
     * Return the notify message from request.
     */
    protected function getMessage(): array
    {
        if (!empty($this->message)) {
            return $this->message;
        }

        try {
            $request = $this->app->request->data;
            $message = $this->app->util->decrypt($request);
            $message = $message['data'];
        } catch (Exception $e) {
            throw new Exception('Invalid request', 400);
        }

        if (!is_array($message) || empty($message)) {
            throw new Exception('Invalid request empty', 400);
        }

        return $this->message = $message;
    }

    /**
     * @param string $message
     */
    protected function fail(string $message)
    {
        $this->fail = $message;
    }

    /**
     * @param mixed $result
     */
    protected function strict($result)
    {
        if (true !== $result && is_null($this->fail)) {
            $this->fail(strval($result));
        }
    }

}
