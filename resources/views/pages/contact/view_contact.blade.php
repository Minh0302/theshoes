@extends('welcome')
@section('slide')
  @include('pages.slide')
@endsection

@section('cart_home')
  @include('pages.cart_home')
@endsection

@section('content')

  <div class="breadcrumb-shop">
    <div class="container">
      <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 pd5">
          <ol class="breadcrumb breadcrumb-arrows">
            <li>
              <a href="{{url('/')}}">
                <span>Trang chủ</span>
              </a>
            </li>
            <li>
              <span><span style="color: #777777">Liên hệ</span></span>
            </li>
          </ol>
        </div>
      </div>
    </div>
  </div>
  <section>

    <div class="container">

      <div class="row">
        <div class="col-md-6 col-sm-12 col-xs-12 box-heading-contact">
          <div class="box-map">
            <iframe
              src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d868.0528036034843!2d105.77196323072616!3d10.03009971324801!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x3bd5a82d4bd21612!2sShop%20Th%E1%BB%83%20Thao%2024h!5e0!3m2!1svi!2s!4v1631594357616!5m2!1svi!2s"
              width="100%" height="700" frameborder="0" style="border:0" allowfullscreen=""></iframe>
          </div>
        </div>
        <div class="col-md-6 col-sm-12 col-xs-12  wrapbox-content-page-contact">
          <div class="header-page-contact clearfix">
            <h1>Liên hệ</h1>
          </div>
          <div class="box-info-contact">
            <ul class="list-info">
              <li>
                <p>Địa chỉ chúng tôi</p>
                <p><strong>Shop Thể Thao 24h, Số 372 Đường 30 Tháng 4, P.Xuân Khánh, Q.Ninh Kiều, TP.Cần Thơ, Việt Nam</strong></p>
              </li>
              <li>
                <p>Email chúng tôi</p>
                <p><strong>sport@gmail.com</strong></p>
              </li>
              <li>
                <p>Điện thoại</p>
                <p><strong>+84 (070) 3893956</strong></p>
              </li>
              <li>
                <p>Thời gian làm việc</p>
                <p><strong>Thứ 2 đến Thứ 6 từ 8h đến 18h; Thứ 7 và Chủ nhật từ 9h30 đến 17h00 </strong></p>
              </li>
            </ul>
          </div>
          <div class="box-send-contact">
            <h2>Gửi thắc mắc cho chúng tôi</h2>
            <div id="col-left contactFormWrapper menuList-links">

              <form accept-charset="UTF-8" class="contact-form" method="post">
                @csrf
                <div class="contact-form">
                  <div class="row">
                    <div class="col-sm-12 col-xs-12">
                      <div class="input-group">
                        <input required="" type="text" name="contact_name" class="contact_name form-control"
                          placeholder="Tên của bạn">
                      </div>
                    </div>
                    <div class="col-sm-6 col-xs-12">  
                      <div class="input-group">
                        <input required="" type="email" name="contact_email" class="contact_email form-control"
                          placeholder="Email của bạn">
                      </div>
                    </div>
                    <div class="col-sm-6 col-xs-12">
                      <div class="input-group">
                        <input  required="" type="text" name="contact_phone" class="contact_phone form-control"
                          placeholder="Số điện thoại của bạn">
                      </div>
                    </div>
                    <div class="col-sm-12 col-xs-12">
                      <div class="input-group">
                        <textarea placeholder="Nội dung" name="contact_notes" class="contact_notes"></textarea>
                      </div>
                    </div>
                    <div class="col-sm-12">
                      <button class="button dark send_contact" type="button" id="send_contact" name="send_contact">Gửi cho chúng tôi</button>
                    </div>
                  </div>
                </div>
              </form>

            </div>
          </div>
        </div>
      </div>


    </div>
@endsection