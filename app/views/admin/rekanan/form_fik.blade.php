
  <div class="row">
   <div class="col-lg-12">
         <h3 class="page-header"><i class="fa fa-th-large" ></i> Form Isian Kualifikasi</h3>
   </div>              
</div>
<div class="row">
   <div class="col-md-12">
         @if(Session::has('messages'))
                        {{ Session::get('messages') }}
         @endif
         @if(count($errors)>0)
            <div class="alert alert-danger alert-dismissable" >
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <strong>Peringatan...</strong><br>
            @foreach($errors->all() as $error)
               {{ $error }}
               <br>
            @endforeach
            </div>
         @endif
         <div class="panel panel-default">
            <div class="panel-heading">
               <div class="alert alert-info" style="margin-bottom:0px;">
                <p style="font-size:18px"><i class="fa fa-info-circle"></i> Informasi :</p>
                <ul type="square">
                  <li>Form ini dipergunakan mengubah data perusahaan rekanan.</li>
                  <li>Diharapkan mengisikan semua data perusahaan secara lengkap.</li>
                </ul>
              </div>
            </div>
            <div class="panel-body">
               <div class="col-lg-12" style="margin-top:-36px;">
                  <h3 class="page-header">Data Administratif</h3>
               </div>    
               <form action="{{ URL::to('admin/rekanan/update/'.$data->id_rkn) }}" method="POST" enctype="multipart/form-data" class="form-horizontal" name="form1" id="form1">
                  <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                  <input type="hidden" name="id_pengadaan" value="{{ $data->id }}" />
                  <div class="col-sm-6" >
                     <div class="form-group">
                        {{ Form::label('nama','Nama Perusahaan',['class'=>'col-sm-4']) }}
                        <div class="col-sm-8">
                           {{ Form::text('nama',$data->nama_rkn,array('class'=>'form-control','id'=>'nama')) }}
                        </div>
                        <div class="clearfix"></div>
                     </div>
                     <div class="form-group">
                        {{ Form::label('nama','Status Perusahaan',['class'=>'col-sm-4']) }}
                        <div class="col-sm-8">
                           {{ Form::select('status', array(''=> '--- Pilih Status ---', 
                                                      'Pusat' => 'Pusat', 
                                                      'Cabang' => 'Cabang'), 
                                                     $data->status_rekanan, array('class'=>'form-control','id'=>'status')) }}
                        </div>
                        <div class="clearfix"></div>
                     </div>
                     <div class="form-group">
                        {{ Form::label('nama','Alamat Perusahaan',['class'=>'col-sm-4']) }}
                        <div class="col-sm-8">
                           {{ Form::textarea('alamat',$data->alamat_rkn,array('size'=>"20x5",'class'=>'form-control','id'=>'alamat')) }}   
                        </div>
                        <div class="clearfix"></div>
                     </div>
                     <div class="form-group">
                        {{ Form::label('nama','No Telepon',['class'=>'col-sm-4']) }}
                        <div class="col-sm-8">
                           {{ Form::text('telp',$data->telp_rkn,array('class'=>'form-control','id'=>'telp')) }}   
                        </div>
                        <div class="clearfix"></div>
                     </div>
                     <div class="form-group">
                        {{ Form::label('nama','No Faximile',['class'=>'col-sm-4']) }}
                        <div class="col-sm-8">
                           {{ Form::text('fax',$data->fax_rkn,array('class'=>'form-control','id'=>'fax')) }}   
                        </div>
                        <div class="clearfix"></div>
                     </div>
                      <div class="form-group">
                        {{ Form::label('nama','No Handphone',['class'=>'col-sm-4']) }}
                        <div class="col-sm-8">
                           {{ Form::text('mobile',$data->mobile_phone_rkn,array('class'=>'form-control','id'=>'mobile')) }}   
                           <p class="help-block" style="font-size:12px;">*format no Handphone 0856477382229</p>
                        </div>
                        
                        <div class="clearfix"></div>
                     </div>
                     <div class="form-group">
                        {{ Form::label('nama','Email Perusahaan',['class'=>'col-sm-4']) }}
                        <div class="col-sm-8">
                           {{ Form::text('email',$data->email_rkn,array('class'=>'form-control','id'=>'email')) }}   
                           <p class="help-block" style="font-size:12px;">* Contoh Format email (myusername@domain.com)</p>
                        </div>
                        <div class="clearfix"></div>
                     </div>
                      <div class="form-group">
                        {{ Form::label('nama','Deskripsi Perusahaan',['class'=>'col-sm-4']) }}
                        <div class="col-sm-8">
                           {{ Form::textarea('deskripsi',$data->deskripsi_rkn,array('size'=>"20x2",'class'=>'form-control','id'=>'deskripsi')) }}   
                        </div>
                        <div class="clearfix"></div>
                     </div>
                     
                  </div>
                  <div class="col-sm-6">
                     <div class="form-group">
                        {{ Form::label('nama','No NPWP',['class'=>'col-sm-4']) }}
                        <div class="col-sm-8">
                           {{ Form::text('npwp',$data->npwp_rkn,array('class'=>'form-control','id'=>'npwp')) }}   
                           <p class="help-block" style="font-size:12px;">* Isikan No NPWP tanpa menggunakan tanda pemisah spasi atau lainnya</p>
                        </div>
                        <div class="clearfix"></div>
                     </div>
                    
                     <div class="form-group">
                        {{ Form::label('nama','File NPWP',['class'=>'col-sm-4']) }}
                        <div class="col-sm-8">
                           @if(null!==$data->file_npwp)
                              <p class="help-block" style="font-size:12px;color:red;">{{ $data->file_npwp }}</p>   
                           @endif
                           {{ Form::file('file_npwp',null,array('class'=>'form-control','id'=>'file_npwp')) }} 
                           <p class="help-block" style="font-size:12px;">* Masukkan file NPWP scan dalam bentuk gambar dengan ekstensi *.jpeg, *.png, *.jpg</p>  
                        </div>
                        <div class="clearfix"></div>
                     </div>
                     <div class="form-group">
                        {{ Form::label('nama','File kop',['class'=>'col-sm-4']) }}
                        <div class="col-sm-8">
                           @if(null!==$data->file_kop)
                              <p class="help-block" style="font-size:12px;color:red;">{{ $data->file_kop }}</p>   
                           @endif
                           {{ Form::file('file_kop',null,array('class'=>'form-control','id'=>'file_kop')) }}
                           <p class="help-block" style="font-size:12px;">* Masukkan Kop Surat scan dalam bentuk gambar dengan ekstensi *.jpeg, *.png, *.jpg</p>     
                        </div>
                        <div class="clearfix"></div>
                     </div>
                     <div class="form-group">
                        {{ Form::label('nama','File KTP',['class'=>'col-sm-4']) }}
                        <div class="col-sm-8">
                           @if(null!==$data->file_ktp)
                              <p class="help-block" style="font-size:12px;color:red;">{{ $data->file_ktp }}</p>   
                           @endif
                           {{ Form::file('file_ktp',null,array('class'=>'form-control','id'=>'file_ktp')) }}
                           <p class="help-block" style="font-size:12px;">* Masukkan ktp scan dalam bentuk gambar dengan ekstensi *.jpeg, *.png, *.jpg</p>     
                        </div>
                        <div class="clearfix"></div>
                     </div>
                     <div class="form-group">
                        {{ Form::label('nama','File SKT',['class'=>'col-sm-4']) }}
                        <div class="col-sm-8">
                           @if(null!==$data->file_rkt)
                              <p class="help-block" style="font-size:12px;color:red;">{{ $data->file_rkt }}</p>   
                           @endif
                           {{ Form::file('file_skt',null,array('class'=>'form-control','id'=>'file_skt')) }}
                           <p class="help-block" style="font-size:12px;">* Masukkan ktp scan dalam bentuk gambar dengan ekstensi *.jpeg, *.png, *.jpg</p>     
                        </div>
                        <div class="clearfix"></div>
                     </div>
                  </div>
                  <div class="col-lg-12" style="margin-top:-15px;">
                     <h3 class="page-header">Ijin Usaha</h3>
                  </div>
                  <div class="col-sm-6">
                     <div class="form-group">
                        {{ Form::label('nama','No SIUP',['class'=>'col-sm-4']) }}
                        <div class="col-sm-8">
                           {{ Form::text('no_siup',$data->ius_no,array('class'=>'form-control','id'=>'no_siup')) }}   
                        </div>
                        <div class="clearfix"></div>
                     </div>
                      <div class="form-group">
                        {{ Form::label('nama','Tanggal SIUP',['class'=>'col-sm-4']) }}
                        <div class="col-sm-8">
                           {{ Form::text('tgl_siup',date("d F Y",strtotime($data->tgl_ius)),array('class'=>'form-control','id'=>'tgl_siup')) }}   
                        </div>
                        <div class="clearfix"></div>
                     </div>
                     <div class="form-group">
                        {{ Form::label('nama','File SIUP',['class'=>'col-sm-4']) }}
                        <div class="col-sm-8">
                            @if(null!==$data->file_siup)
                              <p class="help-block" style="font-size:12px;color:red;">{{ $data->file_siup }}</p>   
                           @endif
                           {{ Form::file('file_siup',null,array('class'=>'form-control','id'=>'file_siup')) }}
                           <p class="help-block" style="font-size:12px;">* Masukkan file SIUP dalam bentuk gambar dengan ekstensi *.jpeg, *.png, *.jpg</p>     
                        </div>
                        <div class="clearfix"></div>
                     </div>
                  </div>
                  <div class="col-sm-6">
                     <div class="form-group">
                        {{ Form::label('nama','Masa Berlaku SIUP',['class'=>'col-sm-4']) }}
                        <div class="col-sm-8">
                           {{ Form::textarea('masa_siup',$data->ius_berlaku,array('size'=>"40x3",'class'=>'form-control','id'=>'masa_siup')) }}   
                        </div>
                        <div class="clearfix"></div>
                     </div>
                     <div class="form-group">
                        {{ Form::label('nama','Instansi Pemberi Ijin',['class'=>'col-sm-4']) }}
                        <div class="col-sm-8">
                           {{ Form::textarea('instansi_siup',$data->ius_instansi,array('size'=>"40x3",'class'=>'form-control','id'=>'instansi_siup')) }}   
                        </div>
                        <div class="clearfix"></div>
                     </div>
                  </div>
                   <div class="col-lg-12" style="margin-top:-15px;">
                     <h3 class="page-header">Ijin TDP</h3>
                  </div>
                  <div class="col-sm-6">
                     <div class="form-group">
                        {{ Form::label('nama','No TDP',['class'=>'col-sm-4']) }}
                        <div class="col-sm-8">
                           {{ Form::text('no_tdp',$data->no_tdp,array('class'=>'form-control','id'=>'no_tdp')) }}   
                        </div>
                        <div class="clearfix"></div>
                     </div>
                      <div class="form-group">
                        {{ Form::label('nama','Tanggal TDP',['class'=>'col-sm-4']) }}
                        <div class="col-sm-8">
                           {{ Form::text('tgl_tdp',date("d F Y",strtotime($data->tgl_tdp)),array('class'=>'form-control','id'=>'tgl_tdp')) }}   
                        </div>
                        <div class="clearfix"></div>
                     </div>
                      <div class="form-group">
                        {{ Form::label('nama','Masa Berlaku TDP',['class'=>'col-sm-4']) }}
                        <div class="col-sm-8">
                           {{ Form::text('masa_tdp',date("d F Y",strtotime($data->masa_tdp)),array('class'=>'form-control','id'=>'masa_tdp')) }}   
                        </div>
                        <div class="clearfix"></div>
                     </div>
                      
                  </div>
                  <div class="col-sm-6">
                     
                     <div class="form-group">
                        {{ Form::label('nama','Instansi Pemberi Ijin',['class'=>'col-sm-4']) }}
                        <div class="col-sm-8">
                           {{ Form::textarea('instansi_tdp',$data->instansi_tdp,array('size'=>"40x3",'class'=>'form-control','id'=>'instansi_tdp')) }}   
                        </div>
                        <div class="clearfix"></div>
                     </div>
                     <div class="form-group">
                        {{ Form::label('nama','File TDP',['class'=>'col-sm-4']) }}
                        <div class="col-sm-8">
                           @if(null!==$data->file_tdp)
                              <p class="help-block" style="font-size:12px;color:red;">{{ $data->file_tdp }}</p>   
                           @endif
                           {{ Form::file('file_tdp',null,array('class'=>'form-control','id'=>'file_tdp')) }}   
                           <p class="help-block" style="font-size:12px;">* Masukkan file TDP dalam bentuk gambar dengan ekstensi *.jpeg, *.png, *.jpg</p>
                        </div>
                        <div class="clearfix"></div>
                     </div>
                  </div>
                  <div class="col-lg-12" style="margin-top:-15px;">
                     <h3 class="page-header">Akte Pendirian Usaha   </h3>
                  </div>
                  <div class="col-sm-6">
                     <div class="form-group">
                        {{ Form::label('nama','No Akte',['class'=>'col-sm-4']) }}
                        <div class="col-sm-8">
                           {{ Form::text('no_akte',$data->no_akte,array('class'=>'form-control','id'=>'no_akte')) }}   
                        </div>
                        <div class="clearfix"></div>
                     </div>
                      <div class="form-group">
                        {{ Form::label('nama','Tanggal Akte',['class'=>'col-sm-4']) }}
                        <div class="col-sm-8">
                           {{ Form::text('tgl_akte',date("d F Y",strtotime($data->tgl_akte)),array('class'=>'form-control','id'=>'tgl_akte')) }}   
                        </div>
                        <div class="clearfix"></div>
                     </div>
                  </div>
                  <div class="col-sm-6">
                      <div class="form-group">
                        {{ Form::label('nama','Nama Notaris',['class'=>'col-sm-4']) }}
                        <div class="col-sm-8">
                           {{ Form::text('notaris',$data->notaris_akte,array('class'=>'form-control','id'=>'notaris')) }}   
                        </div>
                        <div class="clearfix"></div>
                     </div>
                     <div class="form-group">
                        {{ Form::label('nama','File Akte',['class'=>'col-sm-4']) }}
                        <div class="col-sm-8">
                            @if(null!==$data->file_akte)
                              <p class="help-block" style="font-size:12px;color:red;">{{ $data->file_akte }}</p>   
                           @endif
                           {{ Form::file('file_akte',null,array('class'=>'form-control','id'=>'file_akte')) }} 
                           <p class="help-block" style="font-size:12px;">* Masukkan file AKTE dalam bentuk gambar dengan ekstensi *.pdf</p>  
                        </div>
                        <div class="clearfix"></div>
                     </div>
                  </div>
                  <input type="hidden" name="page" value="{{ $data->page }}">
                  <div class="col-sm-12" style="text-align:right;margin-top:20px">
                     {{ Form::submit('Simpan Data & Lanjutkan',array('class'=>'btn btn-success')) }}
                     @if($page =="add")
                     <a href="{{URL::to('admin/rekanan/proses/'.$data->id)}}" class="btn btn-primary" >Kembali Ke Form Sebelumnya</a>
                     @else
                     <a href="{{URL::to('admin/rekanan/beranda/')}}" class="btn btn-primary" >Kembali Ke Beranda</a>
                     @endif
                  </div>
               </form>
            </div>
         </div>
   </div>                
</div>

@section('js')
   {{HTML::style('asset/themes/jquery_ui/jquery-ui.css')}}
   <style type="text/css">
      .ui-datepicker {font-size:13px;}
    </style>
   {{HTML::script('asset/themes/jquery_ui/jquery-ui.js')}}
   {{HTML::script('asset/themes/js/jquery.validate.js')}}
   {{HTML::script('asset/themes/js/additional-methods.min.js')}}

   <script type="text/javascript">
      $(function() {
      
         $("#form1").validate({
              rules:{
                  'nama':{required:true},
                  'status':{required:true},
                  'alamat':{required:true},
                  'telp':{required:true},
                  /*'fax':{required:true},*/
                  'mobile':{required:true,number:true},
                  'email':{required:true,email:true},
                  'npwp':{required:true},
                  @if(null==$data->file_npwp)
                  'file_npwp':{required:true,extension:'jpeg|png|jpg'},
                  @else
                  'file_npwp':{extension:'jpeg|png|jpg'},
                  @endif
                  @if(null==$data->file_rkt)
                  'file_skt':{required:true,extension:'jpeg|png|jpg'},
                  @else
                  'file_skt':{extension:'jpeg|png|jpg'},
                  @endif
                  @if(null==$data->file_ktp)
                  'file_ktp':{required:true,extension:'jpeg|png|jpg'},
                  @else
                  'file_ktp':{extension:'jpeg|png|jpg'},
                  @endif
                  @if(null==$data->file_kop)
                  'file_kop':{required:true,extension:'jpeg|png|jpg'},
                  @else
                  'file_kop':{extension:'jpeg|png|jpg'},
                  @endif
                  @if(null==$data->file_siup)
                  'file_siup':{required:true,extension:'jpeg|png|jpg'},
                  @else
                  'file_siup':{extension:'jpeg|png|jpg'},
                  @endif
                  @if(null==$data->file_akte)
                  'file_akte':{required:true,extension:'pdf'},
                  @else
                  'file_akte':{extension:'pdf'},
                  @endif
                  @if(null==$data->file_tdp)
                  'file_tdp':{required:true,extension:'jpeg|png|jpg'},
                  @else
                  'file_tdp':{extension:'jpeg|png|jpg'},
                  @endif
                  'no_siup':{required:true},
                  'tgl_siup':{required:true,date:true},
                  'masa_siup':{required:true},
                  'instansi_siup':{required:true},
                  'no_tdp':{required:true},
                  'tgl_tdp':{required:true,date:true},
                  'masa_tdp':{required:true},
                  'instansi_tdp':{required:true},
                  'no_akte':{required:true},
                  'tgl_akte':{required:true,date:true},
                  'notaris':{required:true},
                  
              },
              messages:{
                 'nama':'Nama Perusahaan harus diisi',
                  'status':'Status Perusahaan harus dipilih',
                  'alamat':'Alamat harus diisi',
                  'telp':'Telp harus diisi',
                  /*'fax':'Fax harus diisi',*/
                  'mobile':{required:'No Handphone harus diisi',number:'No Handphone harus diisi dengan angka'},
                  'email':{email:'Format email belum benar',required:'Email Harus diisi'},
                  'npwp':{number:'NPWP harus diisi angka'},
                  @if(null==$data->file_npwp)
                  'file_npwp':{required:'File NPWP harus diisi',extension:'file harus berekstensikan jpeg dan png'},
                  @else
                   'file_npwp':{extension:'file harus berekstensikan jpeg dan png'},
                  @endif
                  @if(null==$data->file_rkt)
                  'file_skt':{required:'File SKT harus diisi',extension:'file harus berekstensikan jpeg dan png'},
                  @else
                  'file_skt':{extension:'file harus berekstensikan jpeg dan png'},
                  @endif
                  @if(null==$data->file_ktp)
                  'file_ktp':{required:'File KTP harus diisi',extension:'file harus berekstensikan jpeg dan png'},
                  @else
                  'file_ktp':{extension:'file harus berekstensikan jpeg dan png'},
                  @endif
                  @if(null==$data->file_kop)
                 'file_kop':{required:'File KOP harus diisi',extension:'file harus berekstensikan jpeg dan png'},
                  @else
                  'file_kop':{extension:'file harus berekstensikan jpeg dan png'},
                  @endif
                  @if(null==$data->file_siup)
                  'file_siup':{required:'File SIUP harus diisi',extension:'file harus berekstensikan jpeg dan png'},
                  @else
                  'file_siup':{extension:'file harus berekstensikan jpeg dan png'},
                  @endif
                  @if(null==$data->file_akte)
                  'file_akte':{required:true,extension:'pdf'},
                  @else
                  'file_akte':{extension:'pdf'},
                  @endif
                  @if(null==$data->file_tdp)
                  'file_tdp':{required:'File TDP harus diisi',extension:'file harus berekstensikan jpeg dan png'},
                  @else
                  'file_tdp':{extension:'file harus berekstensikan jpeg dan png'},
                  @endif              
                  'no_siup':'no siup harus diisi',
                  'tgl_siup':{date:'Format tanggal belum benar',required:'Tanggal SIUP Harus diisi'},
                  'masa_siup':'Masa berlaku SIUP harus diisi',
                  'instansi_siup':'Instansi harus diisi',
                  'no_tdp':'No Ijin TDP harus diisi',
                  'tgl_tdp':{date:'Format tanggal belum benar',required:'Tanggal TDP Harus diisi'},
                  'masa_tdp':{date:'Format tanggal belum benar',required:'Masa berlaku Harus diisi'},
                  'instansi_tdp':'Instansi harus diisi',
                  'no_akte':'No Akte harus diisi',
                  'tgl_akte':{date:'Format tanggal belum benar',required:'Tgl Akte Harus diisi'},
                  'notaris':'Nama Notaris harus diisi',
                  'file_akte':{required:'File AKTE harus diisi',extension:'file harus berekstensikan pdf'}
              }
           }); 
      
      getDatePicker("#tgl_siup");
      getDatePicker("#tgl_tdp");
      getDatePicker("#masa_tdp");
      getDatePicker("#tgl_akte");


      function getDatePicker(id){
         $( id ).datepicker({
            dateFormat:"d MM yy",
            changeMonth: true,
            changeYear: true,
            showAnim:"slideDown"
         });         
      }
     });
   </script>
@stop

