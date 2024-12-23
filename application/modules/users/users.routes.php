<?php declare(strict_types=1);

use Inertia\Inertia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::prefix('users')->name('user.')->group(function () {
    Route::get('/', function (Request $r) {
        echo "hello";
        // $userData = UserData::fromRequest($r);
        // $service = UserIndexService::make(
        //   UserData::fromRequest($r->validated()
        // ));

        // $service->execute();

        // return Inertia::render('user.index', [

        // ]);
    })->name('index');
});

// class CreateUserRequest extends Request
// {
//     public function rules()
//     {
//         return [
//           'name' => ['required|string'],
//           'email' => ['required|string|email'],
//           'password' => ['required|string'],
//           'password_verified' => ['required|match:password']
//         ];
//     }
// }

// final readonly class CreateUserDTO
// {
//     private function __construct(
//         public string $name,
//         public string $email,
//         public string $password,
//     ) {}
//     public function __serialize(): array
//     {
//       return [];
//     }
//     public static function fromRequest(Request $request)
//     {
//         return new self(...$request->validated());
//     }
// }

// class StoreUserController
// {
//     public function __construct(private UserStoreService $service) {}
//     public function __invoke(CreateUserRequest $request)
//     {
//         $this->service->handle(CreateUserDTO::fromRequest($request));
//     }
// }

// class UserStoreService
// {
//     public function __constrct() {}
//     public function handle(CreateUserDTO $dto)
//     {
//         $action = new StoreAction();
//         $data = UserData::make($dto);

//         $action->handle($data);
//     }
// }

// class UserData extends Bag
// {
//     public function __construct(
//         public string $name,
//         public string $email,
//         public Password $password,
//         public UserRole $role = UserRole::STANDARD
//     ) {}

//     public function rules()
//     {
//         return [
//           'email' => ['valid_email'],
//           'password' => ['min:8,password_rules'],
//           'role' => ['UserRole']
//         ];
//     }
// }

// class StoreUser
// {
//     public function handle(UserData $data)
//     {
//         // unique email address
//         $this->model()->create($data->toArray());
//     }
// }
