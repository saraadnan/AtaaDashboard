namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;

class TestController extends Controller
{
    public function index()
    {   
    	$category = Category::all();
    	return view('home',compact('lija'));
    }

    public function update($id)
    {
    	$category = Category::find($id);

	    return response()->json([
	      'data' => $category
	    ]);
    }

    public function edit(Request $request, $id)
    {
      Category::updateOrCreate(
       [
        'id' => $id
       ],
       [
        'name' => $request->name,
       ]
      );

      return response()->json([ 'success' => true ]);

    }

   
  }

}
