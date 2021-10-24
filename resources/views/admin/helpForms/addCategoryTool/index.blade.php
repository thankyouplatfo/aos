@extends('layouts.panel')
@section('content')
    <!-- Header -->
    <header class="w3-container" style="padding-top:22px">
        <h5 class="w3-xxlarge"><b><i class="fa fa-list" aria-hidden="true"></i> فئات للأدوات </b><a
                href="{{ route('admin.helpForms.addCategoryTool.create') }}" class="w3-left"><i class="fa fa-plus"></i></a></h5>
    </header>

    <div class="w3-panel">
        <div class="w3-panel w3-rightbar w3-sand w3-xxlarge w3-serif" style="margin: 0!important">
            @if (session()->has('success'))
                <div class="alert alert-success w3-xlarge" style="padding: 0!important">
                    <p><i>"{{ session()->get('success') }}"</i></p>
                    <!--<p class="w3-small"><b><i class="w3-opacity">يتغير الاسم الموجود بين قوسين إذا عدلت اسم القسم</i></b></p>-->
                </div>
            @endif
        </div>
        <div class="w3-row-padding" style="margin:0 -16px">
            <p>
                <input oninput="w3.filterHTML('#id01', '.item', this.value)" class="w3-input w3-block"
                    placeholder="أبحث في جدول الفريق بواسطة المعرف || العنوان || الوصف">
            </p>
            <div class="w3-responsive">
               
                <table id="id01" class="w3-table w3-striped w3-white w3-centered w3-bordered">
                    <tr class="w3-bordered w3-border-black">
                        <th>
                            المعرف
                        </th>
                        <th>
                            الاسم
                        </th>
                        <th class="w3-hide">
                            معاينة
                        </th>
                        <th>
                            تحرير
                        </th>
                        <th>
                            حذف
                        </th>
                    </tr>
                    @foreach ($addCategoryTool as $addCategoryTool)
                        <tr class="item">
                            <td>
                                {{ $addCategoryTool->id }}
                            </td>
                            <td>
                                {{$addCategoryTool->name}}
                            </td>                            
                            <td class="w3-hide">
                                <a href="{{ route('home','#footer') }}"
                                    class=" w3-hover-none w3-button w3-bar-item" target="_blank"><i
                                        class="w3-xlarge fa fa-eye cnsb-hov-txt-green"></i></a>
                            </td>
                            <td>
                                <a type="disabled" href="{{ route('admin.helpForms.addCategoryTool.edit', $addCategoryTool) }}"
                                    class=" w3-hover-none w3-button w3-bar-item"><i
                                        class="w3-xlarge fa fa-edit cnsb-hov-txt-blue"></i></a>
                            </td>
                            <td>
                                <form action="{{ route('admin.helpForms.addCategoryTool.destroy', $addCategoryTool) }}" method="post">@csrf<button
                                        type="submit" class="w3-hover-none w3-button w3-bar-item" onclick="alert('سيتم حذف هذا الصف وجميع بياناته من الجدول الموجود فيه قد يترتب على ذلك حذف التوابع المقترنة بهذا الصف')"><i
                                            class="w3-xlarge fa fa-trash cnsb-hov-txt-red"></i></button></form>
                            </td>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
    <hr>
    <!-- Footer -->
    <footer class="w3-container w3-padding-16 w3-light-grey">
        <h4 id="logo">AOS</h4>
            يشكر موقع AOS موقع <a href="https://www.w3schools.com/w3css/default.asp" target="_blank">w3.css</a> هلى إتاحته هذا القالب بشكب مجاني
        <p class="w3-opacity w3-text-black w3-border-top w3-border-bottom w3-border-black ">
            قام بتعديل هذا القالب بما يتلائم وهذا المشروع المبرمج/ <a href="https://www.facebook.com/almashkliabualeiz">معتز
                المشكلي</a> يمكنك الضغط على <a
                href="https://www.w3schools.com/w3css/tryit.asp?filename=tryw3css_templates_analytics&stacked=h">هنا</a>
            لرؤية القالب قبل التعديل
        </p>
    </footer>
@endsection
