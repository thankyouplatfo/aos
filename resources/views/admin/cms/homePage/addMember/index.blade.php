@extends('layouts.panel')
@section('content')
    <!-- Header -->
    <header class="w3-container" style="padding-top:22px">
        <h5 class="w3-xxlarge"><b><i class="fa fa-users" aria-hidden="true"></i> الفريق</b><a
                href="{{ route('admin.cms.homePage.addMember.create') }}" class="w3-left"><i class="fa fa-plus"></i></a></h5>
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
                            صورة
                        </th>
                        <th>
                            اسم
                        </th>
                        <th>
                            حول
                        </th>
                        <th>
                            البريد 
                        </th>
                        <th>
                            الجوال 
                        </th>
                        <th>
                            وظيفة
                        </th>
                        <th>
                             الفيسبوك
                        </th>
                        <th>
                            تويتر
                        </th>
                        <th>
                            الانستغرام
                        </th>
                        <th>
                            معاينة
                        </th>
                        <th>
                            تحرير
                        </th>
                        <th>
                            حذف
                        </th>
                    </tr>
                    @foreach ($addMember as $addMember)
                        <tr class="item">
                            <td>
                                {{ $addMember->id }}
                            </td>
                            <td class="td-bg" style="background-image: url({{ asset('images/addMember/'.$addMember->image) }})">
                                
                            </td>
                            <td>
                                {{ $addMember->name }}
                            </td>
                            <td>
                                <details>
                                    <summary>انقر للإطلاع</summary>
                                    <p>{{ $addMember->about }}</p>
                                </details>
                            </td>
                            <td>
                                <details>
                                    <summary>انقر للإطلاع</summary>
                                    <p>{{ $addMember->email }}</p>
                                </details>
                            </td>
                            <td>
                                <details>
                                    <summary>انقر للإطلاع</summary>
                                    <p>{{ $addMember->tel }}</p>
                                </details>
                            </td>
                            <td>
                                <details>
                                    <summary>انقر للإطلاع</summary>
                                    <p>{{ $addMember->addRole->name }}</p>
                                </details>
                            </td>
                            <td>
                                <a href=" {{ $addMember->facebookAccount }}">
                                    <i class="fa fa-facebook"></i>
                                </a>
                            </td>
                            <td>
                                <a href=" {{ $addMember->twitterAccount }}">
                                    <i class="fa fa-twitter"></i>
                                </a>
                            </td>
                            <td>
                                <a href=" {{ $addMember->instagramAccount }}">
                                    <i class="fa fa-instagram"></i>
                                </a>
                            </td>
                            <td>
                                <a href="{{ route('our_team',$addMember->slug) }}"
                                    class=" w3-hover-none w3-button w3-bar-item" target="_blank"><i
                                        class="w3-xlarge fa fa-eye cnsb-hov-txt-green"></i></a>
                            </td>
                            <td>
                                <a href="{{ route('admin.cms.homePage.addMember.edit', $addMember) }}"
                                    class=" w3-hover-none w3-button w3-bar-item"><i
                                        class="w3-xlarge fa fa-edit cnsb-hov-txt-blue"></i></a>
                            </td>
                            <td>
                                <form action="{{ route('admin.cms.homePage.addMember.destroy', $addMember) }}" method="post">@csrf<button
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
