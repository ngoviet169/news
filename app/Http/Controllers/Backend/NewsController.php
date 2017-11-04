<?php

namespace App\Http\Controllers\Backend;

use App\Category;
use App\News;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $new = new News();
        $news = $new->getAllNews();

        return view('admin.news.list')->with(compact('news'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cates = Category::all();

        return view('admin.news.form')->with(compact('cates'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'cate_id' => 'required',
            'title' => 'required|unique:news,title',
            'description' => 'required|min:50|max:200',
            'tags' => 'required',
            'content' => 'required'
        ]);

        $new = new News();
        $input = $request->only('cate_id', 'title', 'description', 'tags', 'content', 'is_public');
        $input['title_alias'] = $this->changeTitle($input['title']);
        $status = $new->create($input);

        if (!$status) {
            $fail = 'Sorry, somethings went wrong :(';
            return view('admin.news.form')->with(compact('fail'));
        }

        return redirect()->route('news.index')->with('noti', 'Add News successfully !');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function changeStatus($id)
    {
        $new = News::find($id);
        if($new->is_public == 1) {
            $status = 'Private';
            $new ->update(['is_public' => 0]);
        } else {
            $status = 'Public';
            $new ->update(['is_public' => 1]);
        }

        return redirect()->route('news.index')->with('noti', 'This news is '. $status . '!');
    }

    public function changeTitle($str,$strSymbol='-',$case=MB_CASE_LOWER){// MB_CASE_UPPER / MB_CASE_TITLE / MB_CASE_LOWER
        $str=trim($str);
        if ($str=="") return "";
        $str =str_replace('"','',$str);
        $str =str_replace("'",'',$str);
        $str = $this->stripUnicode($str);
        $str = mb_convert_case($str,$case,'utf-8');
        $str = preg_replace('/[\W|_]+/',$strSymbol,$str);
        return $str;
    }

    public function stripUnicode($str){
        if(!$str) return '';
        //$str = str_replace($a, $b, $str);
        $unicode = array(
            'a'=>'á|à|ả|ã|ạ|ă|ắ|ằ|ẳ|ẵ|ặ|â|ấ|ầ|ẩ|ẫ|ậ|å|ä|æ|ā|ą|ǻ|ǎ',
            'A'=>'Á|À|Ả|Ã|Ạ|Ă|Ắ|Ằ|Ẳ|Ẵ|Ặ|Â|Ấ|Ầ|Ẩ|Ẫ|Ậ|Å|Ä|Æ|Ā|Ą|Ǻ|Ǎ',
            'ae'=>'ǽ',
            'AE'=>'Ǽ',
            'c'=>'ć|ç|ĉ|ċ|č',
            'C'=>'Ć|Ĉ|Ĉ|Ċ|Č',
            'd'=>'đ|ď',
            'D'=>'Đ|Ď',
            'e'=>'é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ|ë|ē|ĕ|ę|ė',
            'E'=>'É|È|Ẻ|Ẽ|Ẹ|Ê|Ế|Ề|Ể|Ễ|Ệ|Ë|Ē|Ĕ|Ę|Ė',
            'f'=>'ƒ',
            'F'=>'',
            'g'=>'ĝ|ğ|ġ|ģ',
            'G'=>'Ĝ|Ğ|Ġ|Ģ',
            'h'=>'ĥ|ħ',
            'H'=>'Ĥ|Ħ',
            'i'=>'í|ì|ỉ|ĩ|ị|î|ï|ī|ĭ|ǐ|į|ı',
            'I'=>'Í|Ì|Ỉ|Ĩ|Ị|Î|Ï|Ī|Ĭ|Ǐ|Į|İ',
            'ij'=>'ĳ',
            'IJ'=>'Ĳ',
            'j'=>'ĵ',
            'J'=>'Ĵ',
            'k'=>'ķ',
            'K'=>'Ķ',
            'l'=>'ĺ|ļ|ľ|ŀ|ł',
            'L'=>'Ĺ|Ļ|Ľ|Ŀ|Ł',
            'o'=>'ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ|ö|ø|ǿ|ǒ|ō|ŏ|ő',
            'O'=>'Ó|Ò|Ỏ|Õ|Ọ|Ô|Ố|Ồ|Ổ|Ỗ|Ộ|Ơ|Ớ|Ờ|Ở|Ỡ|Ợ|Ö|Ø|Ǿ|Ǒ|Ō|Ŏ|Ő',
            'Oe'=>'œ',
            'OE'=>'Œ',
            'n'=>'ñ|ń|ņ|ň|ŉ',
            'N'=>'Ñ|Ń|Ņ|Ň',
            'u'=>'ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự|û|ū|ŭ|ü|ů|ű|ų|ǔ|ǖ|ǘ|ǚ|ǜ',
            'U'=>'Ú|Ù|Ủ|Ũ|Ụ|Ư|Ứ|Ừ|Ử|Ữ|Ự|Û|Ū|Ŭ|Ü|Ů|Ű|Ų|Ǔ|Ǖ|Ǘ|Ǚ|Ǜ',
            's'=>'ŕ|ŗ|ř',
            'R'=>'Ŕ|Ŗ|Ř',
            's'=>'ß|ſ|ś|ŝ|ş|š',
            'S'=>'Ś|Ŝ|Ş|Š',
            't'=>'ţ|ť|ŧ',
            'T'=>'Ţ|Ť|Ŧ',
            'w'=>'ŵ',
            'W'=>'Ŵ',
            'y'=>'ý|ỳ|ỷ|ỹ|ỵ|ÿ|ŷ',
            'Y'=>'Ý|Ỳ|Ỷ|Ỹ|Ỵ|Ÿ|Ŷ',
            'z'=>'ź|ż|ž',
            'Z'=>'Ź|Ż|Ž'
        );
        foreach($unicode as $khongdau=>$codau) {
            $arr=explode("|",$codau);
            $str = str_replace($arr,$khongdau,$str);
        }
        return $str;
    }
}
