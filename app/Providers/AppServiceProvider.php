<?php

namespace Vanguard\Providers;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;
use Vanguard\Repositories\Country\CountryRepository;
use Vanguard\Repositories\Country\EloquentCountry;
use Vanguard\Repositories\Permission\EloquentPermission;
use Vanguard\Repositories\Permission\PermissionRepository;
use Vanguard\Repositories\Role\EloquentRole;
use Vanguard\Repositories\Role\RoleRepository;
use Vanguard\Repositories\Session\DbSession;
use Vanguard\Repositories\Session\SessionRepository;
use Vanguard\Repositories\User\EloquentUser;
use Vanguard\Repositories\User\UserRepository;
use Illuminate\Support\ServiceProvider;
use Vanguard\Repositories\CommonCode\EloquentCommonCode;
use Vanguard\Repositories\CommonCode\CommonCodeRepository;
use Vanguard\Repositories\Category\EloquentCategory;
use Vanguard\Repositories\Category\CategoryRepository;
use Vanguard\Repositories\Equipment\EquipmentRepository;
use Vanguard\Repositories\Equipment\EloquentEquipment;
use Vanguard\Repositories\Inventory\EloquentInventory;
use Vanguard\Repositories\Inventory\InventoryRepository;
use Vanguard\Repositories\Supplier\EloquentSupplier;
use Vanguard\Repositories\Supplier\SupplierRepository;
use Vanguard\Repositories\Customer\EloquentCustomer;
use Vanguard\Repositories\Customer\CustomerRepository;
use Vanguard\Repositories\EquipmentSold\EloquentEquipmentSold;
use Vanguard\Repositories\EquipmentSold\EquipmentSoldRepository;
use Vanguard\Repositories\MovementRent\EloquentMovement;
use Vanguard\Repositories\MovementRent\MovementRepository;
use Vanguard\Repositories\Revenue\EloquentRevenue;
use Vanguard\Repositories\Revenue\RevenueRepository;
use Vanguard\Repositories\Staff\EloquentStaff;
use Vanguard\Repositories\Staff\StaffRepository;
use Vanguard\Repositories\Maintenance\EloquentMaintenance;
use Vanguard\Repositories\Maintenance\MaintenanceRepository;
use Vanguard\Repositories\Warehouse\EloquentWarehouse;
use Vanguard\Repositories\Warehouse\WarehouseRepository;
use Vanguard\Repositories\Sparepart\EloquentSparepart;
use Vanguard\Repositories\Sparepart\SparepartRepository;
use Vanguard\Repositories\Unclaim\EloquentUnclaim;
use Vanguard\Repositories\Unclaim\UnclaimRepository;



class AppServiceProvider extends ServiceProvider
{
    
    public function boot()
    {
        Carbon::setLocale(config('app.locale'));
        config(['app.name' => setting('app_name')]);
        \Illuminate\Database\Schema\Builder::defaultStringLength(191);

        Factory::guessFactoryNamesUsing(function (string $modelName) {
            return 'Database\Factories\\'.class_basename($modelName).'Factory';
        });
    }

    public function register()
    {
        $this->app->singleton(UserRepository::class, EloquentUser::class);
        $this->app->singleton(RoleRepository::class, EloquentRole::class);
        $this->app->singleton(PermissionRepository::class, EloquentPermission::class);
        $this->app->singleton(SessionRepository::class, DbSession::class);
        $this->app->singleton(CountryRepository::class, EloquentCountry::class);
        $this->app->singleton(CommonCodeRepository::class, EloquentCommonCode::class);
        $this->app->singleton(CategoryRepository::class, EloquentCategory::class);
        $this->app->singleton(EquipmentRepository::class, EloquentEquipment::class);
        $this->app->singleton(InventoryRepository::class, EloquentInventory::class);
        $this->app->singleton(SupplierRepository::class, EloquentSupplier::class);
        $this->app->singleton(CustomerRepository::class, EloquentCustomer::class);
        $this->app->singleton(EquipmentSoldRepository::class, EloquentEquipmentSold::class);
        $this->app->singleton(MovementRepository::class, EloquentMovement::class);
        $this->app->singleton(RevenueRepository::class, EloquentRevenue::class);
        $this->app->singleton(StaffRepository::class, EloquentStaff::class);
        $this->app->singleton(MaintenanceRepository::class, EloquentMaintenance::class);
        $this->app->singleton(WarehouseRepository::class, EloquentWarehouse::class);
        $this->app->singleton(SparepartRepository::class, EloquentSparepart::class); 
        $this->app->singleton(UnclaimRepository::class, EloquentUnclaim::class);

        if ($this->app->environment('local')) {
            $this->app->register(\Barryvdh\LaravelIdeHelper\IdeHelperServiceProvider::class);
            $this->app->register(\Barryvdh\Debugbar\ServiceProvider::class);
        }
    }
}
