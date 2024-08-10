namespace App\Services;

use App\Models\Customer;
use Illuminate\Support\Facades\Hash;

class CustomerService
public function create() {
return view('customers.createCustomer');
dd($customers)
}
public function store(Request $request) {

$customer = Customer::create([
'name' => $request->fullname,
'country' => $request->country,
'phone' => $request->phone,
'email' => $request->email,
'password' => $request->password,
'confirmpassword' => $request -> confirmpassword
]);

if ($student) {
return redirect('customers');
}
return 'error';
//
}