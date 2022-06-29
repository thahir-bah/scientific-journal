<?php


namespace App;

use DB;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{

    /**
     * @access protected 
     * @var array $fillable
     */
    protected $fillable = array('title', 'image', 'description');

    /**
     * @access public
     * @desc Get all categories
     * @return collection
     */
    public static function getCategories()
    {
        $categories = DB::table('categories')->paginate(5);
        return $categories;
    }

    /**
     * @access public
     * @param \Illuminate\Http\Request  $request
     * @desc Store categories in database
     * @return \Illuminate\Http\Response
     */
    public function saveCategory($request)
    {
        if (!empty($request)) {
            $cat_img = UploadMedia::mediaUpload('category_image', $request, 'uploads/categories/');
            $this->title = filter_var($request['title'], FILTER_SANITIZE_STRING);
            $this->image = $cat_img;
            $this->description = filter_var($request['description'], FILTER_SANITIZE_STRING);
            $this->save();
        }

    }

    /**
     * @access public
     * @param \Illuminate\Http\Request  $request
     * @param int $category_id
     * @desc Update category
     * @return \Illuminate\Http\Response
     */
    public function updateCategory($request, $category_id)
    {
        if (!empty($request) && !empty($category_id) && is_numeric($category_id)) {
            $category = $this->find($category_id);
            $path = 'uploads/categories/';
            if (!empty($request['hidden_category_image'])) {
                $image_parts = explode('.', $request['hidden_category_image']);
                $image_last_parts = end($image_parts);
                $cat_img = $path . '/' . $image_parts[0] . '-' . time() . '.' . $image_last_parts;
                if (!empty($request['category_image'])) {
                    $request['category_image']->getClientOriginalName();
                    $request['category_image']->move($path, $cat_img);
                }
            } else {
                $cat_img = UploadMedia::mediaUpload('category_image', $request, 'uploads/categories/');
            }
            $category->title = filter_var($request->title, FILTER_SANITIZE_STRING);
            $category->description = filter_var($request->description, FILTER_SANITIZE_STRING);
            $category->image = filter_var($cat_img, FILTER_SANITIZE_STRING);
            $category->save();
        }
    }

    /**
     * @access public
     * @desc Get list of article categories.
     * @return array
     */
    public static function getCategoriesList()
    {
        return DB::table('categories')->pluck('title', 'id')->prepend('Select Article Category', '');
    }

    /**
     * @access public
     * @param int $id
     * @desc Get category by by
     * @return collection
     */
    public static function getCategoryByID($id)
    {
        if (!empty($id) && is_numeric($id)) {
            return DB::table('categories')->select('title', 'id')->where('id', $id)->get()->first();
        }
    }

    /**
     * @access public
     * @desc Get reviewer by category
     * @return collection
     */
    public static function getReviewersCategory()
    {
        return DB::table('categories')
            ->join('reviewers_categories', 'categories.id', '=', 'reviewers_categories.category_id')
            ->select('categories.*')
            ->groupBy('categories.id')
            ->get();
    }

    /**
     * @access public
     * @param array $categories
     * @param int $user_id
     * @desc Store category id and reviewer id in database
     * @return \Illuminate\Http\Response
     */
    public static function saveReviewerCategory($categories = array(), $user_id)
    {
        if (!empty($categories) && !empty($user_id)) {
            $reviewers = DB::table('reviewers_categories')->select('reviewer_id')
                ->where('reviewer_id', $user_id)->get()->pluck('reviewer_id')->toArray();
            if (!empty($reviewers)) {
                if ((in_array($user_id, $reviewers))) {
                    DB::table('reviewers_categories')->where('reviewer_id', $user_id)->delete();
                }
            }
            foreach ($categories as $category) {
                $result = DB::table('reviewers_categories')->insert(
                    [
                        'category_id' => $category, 'reviewer_id' => $user_id,
                        'created_at' => \Carbon\Carbon::now(), 'updated_at' => \Carbon\Carbon::now()
                    ]
                );
            }
            return $result;
        }
    }

    /**
     * @access public
     * @param int $reviewer_id
     * @desc Categories assigned to reviewers
     * @return array
     */
    public static function getCategoryByReviewerID($reviewer_id)
    {
        if (!empty($reviewer_id) && is_numeric($reviewer_id)) {
            return DB::table('reviewers_categories')->select('category_id')
                ->where('reviewer_id', $reviewer_id)->get()->pluck('category_id')->toArray();
        }
    }
}
