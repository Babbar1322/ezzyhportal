
@extends('layouts.admin_app')
@section('content')

<div class="content">
        <div class="row">
          <div class="col-12">
            <div class="card card-chart">
              <div class="card-header ">
                <div class="row">
                  <div class="col-sm-6 text-right">
                    <h5 class="card-category">مجموع الشحنات</h5>
                    <h2 class="card-title">أداء</h2>
                  </div>
                  <div class="col-sm-6">
                    <div class="btn-group btn-group-toggle" data-toggle="buttons">
                      <label class="btn btn-sm btn-primary btn-simple active" id="0">
                        <input type="radio" name="options" checked>
                        <span class="d-none d-sm-block d-md-block d-lg-block d-xl-block"> حسابات</span>
                        <span class="d-block d-sm-none">
                          <i class="tim-icons icon-single-02"></i>
                        </span>
                      </label>
                      <label class="btn btn-sm btn-primary btn-simple" id="1">
                        <input type="radio" class="d-none d-sm-none" name="options">
                        <span class="d-none d-sm-block d-md-block d-lg-block d-xl-block"> المشتريات</span>
                        <span class="d-block d-sm-none">
                          <i class="tim-icons icon-gift-2"></i>
                        </span>
                      </label>
                      <label class="btn btn-sm btn-primary btn-simple" id="2">
                        <input type="radio" class="d-none" name="options">
                        <span class="d-none d-sm-block d-md-block d-lg-block d-xl-block">جلسات</span>
                        <span class="d-block d-sm-none">
                          <i class="tim-icons icon-tap-02"></i>
                        </span>
                      </label>
                    </div>
                  </div>
                </div>
              </div>
              <div class="card-body">
                <div class="chart-area">
                  <canvas id="chartBig1"></canvas>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-4 text-right">
            <div class="card card-chart">
              <div class="card-header">
                <h5 class="card-category">شحنات كاملة</h5>
                <h3 class="card-title"><i class="tim-icons icon-bell-55 text-primary"></i> 763,215</h3>
              </div>
              <div class="card-body">
                <div class="chart-area">
                  <canvas id="chartLinePurple"></canvas>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-4 text-right">
            <div class="card card-chart">
              <div class="card-header">
                <h5 class="card-category">المبيعات اليومية</h5>
                <h3 class="card-title"><i class="tim-icons icon-delivery-fast text-info"></i> 3,500€</h3>
              </div>
              <div class="card-body">
                <div class="chart-area">
                  <canvas id="CountryChart"></canvas>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-4 text-right">
            <div class="card card-chart">
              <div class="card-header">
                <h5 class="card-category">المهام المكتملة</h5>
                <h3 class="card-title"><i class="tim-icons icon-send text-success"></i> 12,100K</h3>
              </div>
              <div class="card-body">
                <div class="chart-area">
                  <canvas id="chartLineGreen"></canvas>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-6 col-sm-6 text-center">
            <div class="card  card-tasks text-left">
              <div class="card-header text-right">
                <h6 class="title d-inline">تتبع</h6>
                <p class="card-category d-inline">اليوم</p>
                <div class="dropdown float-left">
                  <a class="btn btn-link dropdown-toggle" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="tim-icons icon-settings-gear-63"></i></a>
                  <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                    <a class="dropdown-item" href="#">عمل</a>
                    <a class="dropdown-item" href="#">عمل آخر</a>
                    <a class="dropdown-item" href="#">شيء آخر هنا</a>
                  </div>
                </div>
              </div>
              <div class="card-body ">
                <div class="table-full-width table-responsive">
                  <table class="table">
                    <tbody>
                      <tr>
                        <td class="text-center">
                          <div class="form-check">
                            <label class="form-check-label">
                              <input class="form-check-input" type="checkbox" value="" checked>
                              <span class="form-check-sign">
                                <span class="check"></span>
                              </span>
                            </label>
                          </div>
                        </td>
                        <td class="text-right">
                          <p class="title">مركز معالجة موقع محور</p>
                          <p class="text-muted">نص آخر هناالوثائق</p>
                        </td>
                        <td class="td-actions">
                          <button type="button" rel="tooltip" title="" class="btn btn-link" data-original-title="مهمة تحرير">
                            <i class="tim-icons icon-settings"></i>
                          </button>
                        </td>
                      </tr>
                      <tr>
                        <td class="text-center">
                          <div class="form-check">
                            <label class="form-check-label">
                              <input class="form-check-input" type="checkbox" value="">
                              <span class="form-check-sign">
                                <span class="check"></span>
                              </span>
                            </label>
                          </div>
                        </td>
                        <td class="text-right">
                          <p class="title">لامتثال GDPR</p>
                          <p class="text-muted">الناتج المحلي الإجمالي هو نظام يتطلب من الشركات حماية البيانات الشخصية والخصوصية لمواطني أوروبا بالنسبة للمعاملات التي تتم داخل الدول الأعضاء في الاتحاد الأوروبي.</p>
                        </td>
                        <td class="td-actions">
                          <button type="button" rel="tooltip" title="" class="btn btn-link" data-original-title="مهمة تحرير">
                            <i class="tim-icons icon-settings"></i>
                          </button>
                        </td>
                      </tr>
                      <tr>
                        <td class="text-center">
                          <div class="form-check">
                            <label class="form-check-label">
                              <input class="form-check-input" type="checkbox" value="">
                              <span class="form-check-sign">
                                <span class="check"></span>
                              </span>
                            </label>
                          </div>
                        </td>
                        <td class="text-right">
                          <p class="title">القضاياالقضايا</p>
                          <p class="text-muted">سيكونونقال 50٪ من جميع المستجيبين أنهم سيكونون أكثر عرضة للتسوق في شركة</p>
                        </td>
                        <td class="td-actions">
                          <button type="button" rel="tooltip" title="" class="btn btn-link" data-original-title="مهمة تحرير">
                            <i class="tim-icons icon-settings"></i>
                          </button>
                        </td>
                      </tr>
                      <tr>
                        <td class="text-center">
                          <div class="form-check">
                            <label class="form-check-label">
                              <input class="form-check-input" type="checkbox" value="" checked="">
                              <span class="form-check-sign">
                                <span class="check"></span>
                              </span>
                            </label>
                          </div>
                        </td>
                        <td class="text-right">
                          <p class="title">تصدير الملفات التي تمت معالجتها</p>
                          <p class="text-muted">كما يبين التقرير أن المستهلكين لن يغفروا شركة بسهولة بمجرد حدوث خرق يعرض بياناتهم الشخصية.</p>
                        </td>
                        <td class="td-actions">
                          <button type="button" rel="tooltip" title="" class="btn btn-link" data-original-title="مهمة تحرير">
                            <i class="tim-icons icon-settings"></i>
                          </button>
                        </td>
                      </tr>
                      <tr>
                        <td class="text-center">
                          <div class="form-check">
                            <label class="form-check-label">
                              <input class="form-check-input" type="checkbox" value="" checked="">
                              <span class="form-check-sign">
                                <span class="check"></span>
                              </span>
                            </label>
                          </div>
                        </td>
                        <td class="text-right">
                          <p class="title">الوصول إلى عملية التصدير</p>
                          <p class="text-muted">سياسة السيء إنطلاق في قبل, مساعدة والمانيا أخذ قد. بل أما أمام ماشاء الشتاء،, تكاليف الإقتصادي بـ حين. ٣٠ يتعلّق للإتحاد ولم, وتم هناك مدينة بتحدّي إذ, كان بل عمل</p>
                        </td>
                        <td class="td-actions">
                          <button type="button" rel="tooltip" title="" class="btn btn-link" data-original-title="مهمة تحرير">
                            <i class="tim-icons icon-settings"></i>
                          </button>
                        </td>
                      </tr>
                      <tr>
                        <td class="text-center">
                          <div class="form-check">
                            <label class="form-check-label">
                              <input class="form-check-input" type="checkbox" value="">
                              <span class="form-check-sign">
                                <span class="check"></span>
                              </span>
                            </label>
                          </div>
                        </td>
                        <td class="text-right">
                          <p class="title">الافراج عن v2.0.0</p>
                          <p class="text-muted">عن رئيس طوكيو البولندي لمّ, مايو مرجع وباءت قبل هو, تسمّى الطريق الإقتصادي ذات أن. لغات الإطلاق الفرنسية دار ان, بين بتخصيص الساحة اقتصادية أم. و الآخ</p>
                        </td>
                        <td class="td-actions">
                          <button type="button" rel="tooltip" title="" class="btn btn-link" data-original-title="مهمة تحرير">
                            <i class="tim-icons icon-settings"></i>
                          </button>
                        </td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-6 col-sm-6">
            <div class="card ">
              <div class="card-header text-right">
                <h4 class="card-title">جدول بسيط</h4>
              </div>
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table tablesorter " id="">
                    <thead class=" text-primary">
                      <tr>
                        <th>
                          اسم
                        </th>
                        <th>
                          بلد
                        </th>
                        <th>
                          مدينة
                        </th>
                        <th class="text-center">
                          راتب
                        </th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td>
                          رايس داكوتا
                        </td>
                        <td>
                          النيجر
                        </td>
                        <td>
                          العود-تورنهاوت
                        </td>
                        <td class="text-center">
                          $36,738
                        </td>
                      </tr>
                      <tr>
                        <td>
                          مينيرفا هوبر
                        </td>
                        <td>
                          كوراساو
                        </td>
                        <td>
                          Sinaai-واس
                        </td>
                        <td class="text-center">
                          $23,789
                        </td>
                      </tr>
                      <tr>
                        <td>
                          سيج رودريجيز
                        </td>
                        <td>
                          هولندا
                        </td>
                        <td>
                          بايلي
                        </td>
                        <td class="text-center">
                          $56,142
                        </td>
                      </tr>
                      <tr>
                        <td>
                          فيليب شانيه
                        </td>
                        <td>
                          كوريا، جنوب
                        </td>
                        <td>
                          اوفرلاند بارك
                        </td>
                        <td class="text-center">
                          $38,735
                        </td>
                      </tr>
                      <tr>
                        <td>
                          دوريس غرين
                        </td>
                        <td>
                          مالاوي
                        </td>
                        <td>
                          المنع
                        </td>
                        <td class="text-center">
                          $63,542
                        </td>
                      </tr>
                      <tr>
                        <td>
                          ميسون بورتر
                        </td>
                        <td>
                          تشيلي
                        </td>
                        <td>
                          غلوستر
                        </td>
                        <td class="text-center">
                          $78,615
                        </td>
                      </tr>
                      <tr>
                        <td>
                          جون بورتر
                        </td>
                        <td>
                          البرتغال
                        </td>
                        <td>
                          غلوستر
                        </td>
                        <td class="text-center">
                          $98,615
                        </td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      @endsection