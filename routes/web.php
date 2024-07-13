<?php
use App\Http\Controllers\AjaxController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\Auth\SignInController;
use App\Http\Controllers\Auth\SignUpController;
use App\Http\Controllers\Cart\CartController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\Country\CountryController;
use App\Http\Controllers\Dashboard\AdminController;
use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\Dashboard\ManagerController;
use App\Http\Controllers\Dashboard\SeniorController;
use App\Http\Controllers\Dump\DumpController;
use App\Http\Controllers\Excel\ExcelController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Hottour\HottourController;
use App\Http\Controllers\Pages\PageController;
use App\Http\Controllers\SitemapController;
use App\Http\Controllers\Tour\TourController;
use App\Http\Controllers\Tourvisor\TourvisorController;
use App\MoonShine\Controllers\MoonshineCalculatorCreditController;
use App\MoonShine\Controllers\MoonshineSettingController;
use App\MoonShine\Controllers\ReplacementController;
use Illuminate\Support\Facades\Route;

/**
 * регистрация - вход - лк
 */

Route::controller(HomeController::class)->group(function () {

    Route::get('/', 'index')
        ->name('home');
});

Route::controller(SignUpController::class)->group(function () {

    Route::get('/sign-up', 'page')
        ->middleware('guest')
        ->name('register');
    Route::post('/sign-up', 'handle')

        ->name('register.handle');

});

Route::controller(SignInController::class)->group(function () {

    Route::get('/login', 'pagePhone')
        ->middleware('guest')
        ->name('login');

    Route::get('/login/email', 'pageEmail')
        ->middleware('guest')
        ->name('login.email');



    Route::post('/login', 'handlePhone')
        ->name('login.handle.phone');
    Route::post('/login/email', 'handleEmail')
        ->name('login.handle.email');

});



Route::controller(ForgotPasswordController::class)->group(function () {

    Route::get('/forgot-password', 'page')
        ->middleware('guest')
        ->name('forgot');

    Route::post('/forgot-password', 'handle')
        ->middleware('guest')
        ->name('forgot.handel');

});

Route::controller(ResetPasswordController::class)->group(function () {

    Route::get('/reset-password/{token}','page')
        ->middleware('guest')
        ->name('password.reset');

    Route::post('/reset-password', 'handle')
        ->middleware('guest')
        ->name('password.handle');

});

Route::controller(LogoutController::class)->group(function () {

    Route::post('/logout', 'page')->name('logout');

});


Route::controller(DashboardController::class)->group(function () {

    Route::get('/cabinet', 'page')
        ->middleware('auth.published')
        ->name('cabinet');

    Route::get('/cabinet/setting', 'setting')
        ->middleware('auth.published')
        ->name('setting');

    Route::post('/cabinet/setting.handel', 'settingHandel')
        ->middleware('auth.published')
        ->name('setting.handel');

    Route::get('/cabinet/favourites', 'favoritesUser')
        ->middleware('auth.published')
        ->name('favorites_user');

    Route::post('/cabinet/setting-password.handel', 'settingPasswordHandel')
        ->middleware('auth.published')
        ->name('setting.password.handel');

    Route::get('/cabinet/importants', 'important')
        ->middleware('auth.published')
        ->name('important');


    Route::get('/cabinet/importants/full/{id}', 'fullImportant')
        ->middleware('auth.published')
        ->name('full.important');

    Route::get('/cabinet/certificate', 'certificate')
        ->middleware('auth.published')
        ->name('certificate');

    /**  fullCertificate - не делаем ** */


    Route::get('/cabinet-blocked', 'blocked')
        ->middleware('auth.blocked')
        ->name('blocked');


/*    Route::post('/cabinet.handle', 'handle')
        ->middleware('auth.published')
        ->name('cabinet.handle');

    Route::get('/cabinet-blocked', 'blocked')
        ->middleware('auth.blocked')
        ->name('blocked');*/


});

Route::controller(AdminController::class)->group(function () {

    /** важное **/
    Route::get('/cabinet/admin/edit', 'pageEdit')
        ->middleware(['role:admin'])
        ->name('page.edit');

    Route::get('/cabinet/admin/edit/important', 'pageImportant')
        ->middleware(['role:admin'])
        ->name('page.important');

    Route::get('/cabinet/admin/edit/important/update/{id}', 'pageUpdateImportant')
        ->middleware(['role:admin'])
        ->name('pageupdate.important');

    Route::post('/cabinet/admin.important.add.important', 'addImportant')
        ->middleware(['role:admin'])
        ->name('add.important');

    Route::post('/cabinet/admin.important.update.important', 'updateImportant')
        ->middleware(['role:admin'])
        ->name('update.important');

    Route::post('/cabinet/admin.important.del.important', 'delImportant')
        ->middleware(['role:admin'])
        ->name('delete.important');
    /** важное **/

    /** сертификаты **/

    Route::get('/cabinet/admin/edit/certificate', 'pageCertificate')
        ->middleware(['role:admin, manager'])
        ->name('page.certificate');

    Route::get('/cabinet/admin/edit/certificate/update/{id}', 'pageUpdateCertificate')
        ->middleware(['role:admin, manager'])
        ->name('pageupdate.certificate');

    Route::post('/cabinet/admin/certificates.add.certificates', 'addCertificate')
        ->middleware(['role:admin, manager'])
        ->name('add.certificate');

    Route::post('/cabinet/admin.certificates.update.certificates', 'updateCertificate')
        ->middleware(['role:admin, manager'])
        ->name('update.certificate');

    Route::post('/cabinet/admin.certificates.del.certificates', 'delCertificate')
        ->middleware(['role:admin, manager'])
        ->name('delete.certificate');


    Route::get('/cabinet/users/user/{id}/certificates', 'certificaresUser')
        ->middleware(['role:admin, manager'])
        ->name('page.certificates.user');

    Route::get('/cabinet/users/user/{id}/certificates/add', 'pageAddCertificaresUser')
        ->middleware(['role:admin, manager'])
        ->name('update.certificate.user');

    Route::get('/cabinet/users/user/{id}/certificates/update/{certificate_id}', 'pageUpdateCertificaresUser')
        ->middleware(['role:admin, manager'])
        ->name('update.certificates.user');

    /** сертификаты **/


    Route::get('/cabinet/users', 'users')
        ->middleware(['role:admin'])
        ->name('page.users');


    Route::post('/cabinet/users', 'userSearch')
        ->middleware(['role:admin'])
        ->name('search.users');

    Route::post('/cabinet.users_for_manager', 'filterManagerForUser')
        ->middleware(['role:admin'])
        ->name('filter.users_for_manager');

    Route::post('/cabinet/managers/manager/{id}/setting', 'subuserSearch')
        ->middleware(['role:admin'])
        ->name('search.subusers');

    Route::get('/cabinet/users/user/{id}/setting', 'pageUser')
        ->middleware(['role:admin'])
        ->name('page.page_user');

    Route::post('/cabinet/users.user.setting', 'updateUser')
        ->middleware(['role:admin, manager'])
        ->name('update.user');

    Route::get('/cabinet/users/user/{id}/tours', 'toursUser')
        ->middleware(['role:admin']);

    Route::get('/cabinet/users/user/{id}/manager', 'managerForUser')
        ->middleware(['role:admin']);

    Route::post('/cabinet.users.user.manager', 'updateManagerForUser')
        ->middleware(['role:admin'])
        ->name('update.managerforuser');


    Route::get('/cabinet/users/adduser', 'addUser')
        ->middleware(['role:admin'])
        ->name('add.user');


    Route::get('/cabinet/users/user/{id}/balls', 'pageBallForUser')
        ->middleware(['role:admin,manager'])
        ->name('page.ball.user');

    Route::post('/cabinet.user.update.ball', 'updateBallForUser')
        ->middleware(['role:admin,manager'])
        ->name('update.user.ball');




    Route::get('/cabinet/managers', 'managers')
        ->middleware(['role:admin'])
        ->name('page.managers');



    Route::get('/cabinet/managers/addmanager', 'addManager')
        ->middleware(['role:admin'])
        ->name('add.manager');

    Route::get('/cabinet/managers/manager/{id}/setting', 'pageManager')
        ->middleware(['role:admin']);

    Route::post('/cabinet/managers.manager.setting', 'updateManager')
        ->middleware(['role:admin'])
        ->name('update.manager');

    Route::post('/cabinet/managers.reserve', 'updateManagerReserve')
        ->middleware(['role:admin'])
        ->name('update.manager.reserve');

    Route::post('/cabinet/user.delete', 'deleteUser')
        ->middleware(['role:admin'])
        ->name('delete.user');

    Route::get('/cabinet/seniors', 'seniors')
        ->middleware(['role:admin'])
        ->name('page.seniors');



    Route::post('/cabinet/senior.delete', 'deleteSenior')
        ->middleware(['role:admin'])
        ->name('delete.senior');


    Route::get('/cabinet/seniors/senior/{id}/list', 'addManagerFromSeniorMinus')
        ->middleware(['role:admin'])
        ->name('page.senior');

    Route::get('/cabinet/seniors/senior/{id}/add', 'addManagerFromSeniorPlus')
        ->middleware(['role:admin'])
        ->name('page.add.manager_from_senior');

    Route::get('/cabinet/seniors/addsenior', 'pageAddSenior')
        ->middleware(['role:admin'])
        ->name('page.add.senior');

    Route::post('/cabinet/senior.addsenior', 'addSenior')
        ->middleware(['role:admin'])
        ->name('add.senior');

    Route::post('/cabinet/senior.update.managers_plus.senior', 'updateSeniorComandsPlus')
        ->middleware(['role:admin'])
        ->name('update.managers_plus.senior');

    Route::post('/cabinet/senior.update.managers_minus.senior', 'updateSeniorComandsMinus')
        ->middleware(['role:admin'])
        ->name('update.managers_minus.senior');



});


Route::controller(ManagerController::class)->group(function () {


    Route::get('/cabinet/m/users', 'manager_Users')
        ->middleware(['role:manager'])
        ->name('page.manager_Users');

    Route::post('/cabinet/m/users', 'manager_UsersSearch')
        ->middleware(['role:manager'])
        ->name('search.manager_Users');

    Route::get('/cabinet/m/users/{id}/setting', 'manager_UsersPageUser')
        ->middleware(['role:manager'])
        ->name('page.manager_UsersPageUser');


    Route::get('/cabinet/m/users/adduser', 'manager_UsersAddUser')
        ->middleware(['role:manager'])
        ->name('add.manager_UsersPageUser');

    Route::get('/cabinet/m/users/user/{id}/certificates', 'manager_UsersCertificaresUser')
        ->middleware(['role:admin, manager'])
        ->name('page.manager_UsersCertificates.user');

    Route::get('/cabinet/m/users/user/{id}/tours', 'manager_UsersToursUser')
        ->middleware(['role:manager'])
    ->name('page.manager_ToursUser.user');

    /** сертификаты **/
    /** добавляет только senior  **/


    Route::get('/cabinet/m/users/user/{id}/certificates/add', 'manager_UsersCertificaresUserAdd')
        ->middleware(['role:manager'])
        ->name('page.manager_UsersCertificatesAdd.user');



    Route::get('/cabinet/m/users/user/{id}/certificates/update/{certificate_id}', 'manager_UsersCertificaresUserUpdate')
        ->middleware(['role:manager'])
        ->name('page.manager_UsersCertificatesUpdate.user');


    /** добавляет только senior  **/
    /** сертификаты **/




});
Route::controller(SeniorController::class)->group(function () {


    Route::get('/cabinet/s/managers', 'senior_Managers')
        ->middleware(['role:manager'])
        ->name('page.senior_Managers');


    Route::get('/cabinet/s/managers/manager/{id}/setting', 'senior_Manager')
        ->middleware(['role:manager'])
        ->name('page.senior_Manager');

    Route::post('/cabinet/s/managers/manager/{id}/setting', 'subuserSearch')
        ->middleware(['role:manager'])
        ->name('search.senior_Manager');

    Route::get('/cabinet/s/managers/addmanager', 'senior_addManager')
        ->middleware(['role:manager'])
        ->name('page.senior_addManager');



    /*
     *
     *
        Route::get('/cabinet/m/users/{id}/setting', 'manager_UsersPageUser')
            ->middleware(['role:manager'])
            ->name('page.manager_UsersPageUser');*/

});


/**
 * END
 * регистрация - вход - лк
 */


Route::controller(AjaxController::class)->group(function () {

    Route::post('/send-mail/order-call', 'OrderCall');
    Route::post('/send-mail/order-mini', 'OrderMini');
    Route::post('/send-mail/calc', 'Calc');

    Route::post('/send-mail/pick_tour', 'PickTour');
    Route::post('/send-mail/pick_subscription', 'PickSubscription');

    Route::post('/send-mail/pick_responce', 'PickResponce');

    Route::post('/send-mail/send_order_tour', 'send_order_tour');
    Route::post('/set-sity/city-action', 'sity');
    Route::post('/get-hotel-info', 'getHotelInfo');

    /* из файла resources/views/include/search/js/find-tour_js.blade.php */
    Route::post('/get-array-hotels', 'getArrayHotels');
    /* из файла resources/views/include/search/js/find-tour_js.blade.php */

    /* загрузка аватара*/
    Route::post('/cabinet/upload-avatar', 'uploadAvatar')->name('uploadAvatar');
    /* загрузка аватара для user админом*/
    Route::post('/cabinet/upload-avatar-admin-to-user', 'uploadAvatarAdminUser')->name('uploadAvatarAdminUser');
    /* подписание договора*/
    Route::post('/cabinet/signing-the-contract', 'signingContract');
    /* получение промокода*/
    Route::post('/cabinet/get-promo', 'getPromoCode');
    /* получение туров в ЛК*/
    Route::post('/cabinet/get-tours', 'getTours');
    /* установим новые бонусы в ЛК*/
    Route::post('/cabinet/get-newbonus', 'getNewBonus');
    /* ТЕСТ отправка письма*/
    Route::post('/cabinet/send-signature-email', 'sendEmailSignature');
    /* отправка туров в избранное */
    Route::post('/cabinet/insert-favorite', 'insertFavorite');
    /* отправка туров из избранного */
    Route::post('/cabinet/delete-favorite', 'deleteFavorite');
    /* удаление Отеля и  туров в лк */
    Route::post('/cabinet/delete-favorite2', 'deleteFavorite2');

});

Route::controller(TourvisorController::class)->group(function () {

    Route::get('/'.config('links.link.search'), 'pageTours')->name('search_tours');
    Route::match(['get', 'post'],'/tourvisor/ajax', 'ajax');
    Route::get('/'.config('links.link.hotels'), 'pageHotels')->name('search_hotels');
    Route::post('/tourvisor/autocomplete', 'autocomplete');
    Route::get('/go-to-the-hotel\'s-page/{slug}', 'redirtect_toHotel');
    Route::get('/main-hot-tours', 'hotTours')->name('hotTours');

});

Route::controller(CountryController::class)->group(function () {

    Route::get('/'.config('links.link.countries'), 'pages')->name('countries');
    Route::get('/'.config('links.link.countries').'/{slug}', 'page')->name('country');

    Route::get('/'.config('links.link.countries').'/{slug_country}/{slug_subcountry}', 'category');
    Route::get('/'.config('links.link.countries').'/{slug_country}/{slug_subcountry}/{slug_subcountry__item}', 'item');

});

Route::controller(TourController::class)->group(function () {

    Route::get('/'.config('links.link.tours').'/{slug}', 'page')->name('tour');

});

Route::controller(DumpController::class)->group(function () {

    Route::get('/'.config('links.link.dump').'/{slug}', 'page')->name('dump');
    Route::get('/'.config('links.link.dump').'/{slug_category}'.'/{slug_category__item}', 'item');

    Route::get('/'.config('links.link.dump2').'/{slug}', 'page2')->name('dump2');
    Route::get('/'.config('links.link.dump2').'/{slug_category}'.'/{slug_category__item}', 'item2');

});


Route::controller(ContactController::class)->group(function () {

    Route::get('/'. config('links.link.contacts') , 'page');

});

Route::controller(HottourController::class)->group(function () {

    Route::get('/'. config('links.link.hottour').'/{slug_category}' , 'category');
    Route::get('/'. config('links.link.hottour').'/{slug_category}/{slug_item}' , 'item');

});

Route::get('/replacement/update', ReplacementController::class);



Route::controller(ExcelController::class)->group(function () {

    Route::get('/excel', 'showImportExportView');
    Route::post('/import', 'import')->name('import');

});


Route::controller(SitemapController::class)->group(function () {

    Route::get('/sitemap.xml', 'index')->name('s_index');
    Route::get('/sitemap/pages.xml', 'pages')->name('s_pages');
    Route::get('/sitemap/travels.xml', 'travels')->name('s_travels');
    Route::get('/sitemap/tours.xml', 'tours')->name('s_tours');
    Route::get('/sitemap/dumps.xml', 'dumps')->name('s_dumps');
    Route::get('/sitemap/dumps2.xml', 'dumps2')->name('s_dumps2');
    Route::get('/sitemap/countries.xml', 'countries')->name('s_countries');

});

Route::post('/moonshine/setting-website', MoonshineSettingController::class);
Route::post('/moonshine/calculator-credit', MoonshineCalculatorCreditController::class);



Route::controller(PageController::class)->group(function () {

    Route::get('{page:slug}', 'page')->name('page');

});


Route::controller(CartController::class)->group(function () {

    Route::post('/temp/cart', 'cart_form')->name('cart_form');
    Route::get('/temp/cart', 'cart')->name('cart');

    Route::post('/temp/cart/finish', 'cart_form_step2')->name('cart_form_step2');
    Route::get('/temp/cart/finish', 'cart_form_finish')->name('cart_form_finish');
    Route::get('/temp/cart/orders', 'cart_orders')->name('cart_orders');
    Route::post('/temp/cart/clear', 'cart_form_clear')->name('cart_form_clear');
    Route::get('/collection/{url}', 'collection_tours')->name('collection_tours');

});





