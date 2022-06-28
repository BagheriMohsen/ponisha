<?php

namespace App\Providers;

use App\Repositories\AnswerRepositoryInterface;
use App\Repositories\Eloquent\AnswerRepository;
use App\Repositories\Eloquent\QuestionRepository;
use App\Repositories\Eloquent\UserRepository;
use App\Repositories\QuestionRepositoryInterface;
use App\Repositories\UserRepositoryInterface;
use App\Services\Api\V1\AnswerService;
use App\Services\Api\V1\AnswerServiceInterface;
use App\Services\Api\V1\QuestionService;
use App\Services\Api\V1\QuestionServiceInterface;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{

    public function register()
    {
        $this->bindingRepositories();
        $this->bindingServices();
    }

    public function boot()
    {
        //
    }

    private function bindingRepositories()
    {
        $this->app->bind(UserRepositoryInterface::class, UserRepository::class);
        $this->app->bind(QuestionRepositoryInterface::class, QuestionRepository::class);
        $this->app->bind(AnswerRepositoryInterface::class, AnswerRepository::class);
    }

    private function bindingServices()
    {
        $this->app->bind(QuestionServiceInterface::class, QuestionService::class);
        $this->app->bind(AnswerServiceInterface::class, AnswerService::class);
    }
}
