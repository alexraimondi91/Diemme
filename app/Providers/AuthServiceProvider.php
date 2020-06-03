<?php

namespace App\Providers;

use App\models\auth\Group;
use App\models\auth\Service;
use App\models\Chat;
use App\models\Contact;
use App\models\Index;
use App\models\Layout;
use App\models\Product;
use App\models\Quotation;
use App\models\Technology;
use App\Policies\ChatPolicy;
use App\Policies\ContactPolicy;
use App\Policies\GroupPolicy;
use App\Policies\IndexPolicy;
use App\Policies\LayoutPolicy;
use App\Policies\ProductPolicy;
use App\Policies\QuotationPolicy;
use App\Policies\ServicePolicy;
use App\Policies\TechnologyPolicy;
use App\Policies\UserManagePolicy;
use App\User;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Model' => 'App\Policies\ModelPolicy',
        Contact::class => ContactPolicy::class,
        Group::class=>GroupPolicy::class,
        Index::class=>IndexPolicy::class,
        Layout::class=>LayoutPolicy::class,
        Product::class=>ProductPolicy::class,
        Quotation::class=>QuotationPolicy::class,
        Technology::class=>TechnologyPolicy::class,
        Service::class=>ServicePolicy::class,
        User::class=>UserManagePolicy::class,
        Chat::class=>ChatPolicy::class
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        //
    }
}
