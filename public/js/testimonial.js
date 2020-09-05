$(document).ready(function () {
  var Host = window.location.origin;  

  // All URLs
  var StoreURL   = Host + '/onlineexam/exam/store/';
  var ListURL    = Host + '/onlineexam/exam/';
  var ShowURL    = Host + '/onlineexam/exam/show/';
  var EditURL    = Host + '/onlineexam/exam/edit/';
  var UpdateURL  = Host + '/onlineexam/exam/update/';    
  var DestroyURL = Host + '/onlineexam/exam/destroy/';
  var TrashURL   = Host + '/onlineexam/exam/trash/';
  var RestoreURL = Host + '/onlineexam/exam/restore/';
  var ClearURL   = Host + '/onlineexam/exam/clear/';
  var EmptyURL   = Host + '/onlineexam/exam/empty/';    

  // Toast Notification definition
  const Toast = Swal.mixin({
    toast: true,
    position: 'top',
    showConfirmButton: false,
    timer: 3000,
    timerProgressBar: false,
    onOpen: (toast) => {
      toast.addEventListener('mouseenter', Swal.stopTimer)
      toast.addEventListener('mouseleave', Swal.resumeTimer)
    }
  })

  // Returns a formatted Filename with DocumentTitle + Date + Time
  function getExportFileName() {
    var today = new Date();
    var date = today.getFullYear()+''+(today.getMonth()+1)+''+today.getDate();
    var time = today.getHours() + "" + today.getMinutes() + "" + today.getSeconds();   

    return document.title+'_'+date+'_'+time; //Page Title+Current Date+Current Time
  }

  // Setting header
  $.ajaxSetup({
    headers:{
      'X-XSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
    }
  });

  // DataTable Reload button definition
  $.fn.dataTable.ext.buttons.reload = {
    text: 'Reload',
    action: function ( e, dt, node, config ) {
        dt.ajax.reload(null, false);
    }
  };
  
  // Initiate Data Table
  var DataTable = $('#DataTable').DataTable({
    dom:'Brf'+'<"row"<"col-sm-2"i><"col-sm-2"l><"col-sm-8"p>>'+'tip',
    buttons:[
      {
        text:'<i class="fa fa-search"></i> Advanced Search',
        titleAttr:'Advanced Search',
        action:function(e,dt,node,config){
          $('#AdvancedSearchModal').modal('show');
        }
      },
      {
        extend:'reload',
        text:'<i class="fa fa-refresh"></i>',
        titleAttr:'Reload'
      },
      {
        extend:'colvis',
        text:'<i class="fa fa-columns"></i>',
        titleAttr:'Columns',
      },
      {
        extend:'copy',
        titleAttr:'Copy to Clipboard',
        text:'<i class="fa fa-copy"></i>',
        exportOptions:{
          columns:':visible'
        }
      },
      {
        extend:'print',
        text:'<i class="fa fa-print"></i>',
        titleAttr:'Print',
        messageTop:'Printed',
        messageBottom:'Printed from Automation Software',
        autoPrint:false,
        exportOptions:{
          columns:':visible'
        }
      },     
      {
        extend:'collection',
        text:'<i class="fa fa-download"></i> <span class="caret"></span>',
        titleAttr:'Export',
        buttons:[
          {
            extend:'excel',
            title:'Language_List',
            text:'Excel',
            exportOptions:{
              columns:':visible'
            },
            filename:function(){ return getExportFileName();}
          },
          {
            extend:'pdfHtml5',
            text:'PDF',
            charset:'utf-8',
            bom:true,
            exportOptions:{
              columns:':visible'
            },
            filename:function(){ return getExportFileName();}
          },
          {
            extend:'csv',
            title:'Language_List',
            text:'CSV',
            exportOptions:{
              columns:':visible'
            },
            filename:function(){ return getExportFileName();}
          },
          {
            extend:'csv',
            title:'Language_List',
            text:'TSV',
            fieldSeparator:'\t',
            extension:'.tsv',
            exportOptions:{
              columns:':visible'
            },
            filename:function(){ return getExportFileName();}
          },          
          {
            text: 'JSON',
            exportOptions:{
              columns:':visible'
            },
            action: function ( e, dt, button, config ) {
              var data = dt.buttons.exportData();

              $.fn.dataTable.fileSave(
                new Blob( [ JSON.stringify( data ) ] ),
                getExportFileName()
              );
            },
          }
        ],
      }
    ],
    processing: true,
    responsive:true,
    colReorder:true,
    serverSide: true,
    blengthMenu:true,    
    lengthMenu:[[10,20,30,50,100,150,200,500,-1],[10,20,30,50,100,150,200,500,'All']],
    pagingType:'full_numbers',
    language:{
      sLengthMenu:'_MENU_ rows per page',
      paginate: {
        first:    'First',
        previous: 'Previous',
        next:     'Next',
        last:     'Last'
      },
      aria: {
        paginate: {
          first:    'First',
          previous: 'Previous',
          next:     'Next',
          last:     'Last'
        }
      },
      processing:'<strong><i class="fa fa-spinner fa-lg fa-spin"></i> Loading. Please wait...</strong>',
      search:'_INPUT_',
      searchPlaceholder:'Search...',
    },
    stateSave:true, 
    ajax: {
      url:ListURL,
      type:'GET'
    },
    columns: [      
      {data: 'DT_RowIndex', name:'DT_RowIndex',orderable:false,searchable:false, visible:false},
      {data: 'id',name:'id','visible':false},
      {data: 'Name'},
      {data: 'Month'},
      {data: 'Year'},
      {data: 'DateOfStart'},
      {data: 'DateOfEnd'},
      {data: 'Institute'},
      {data: 'Status',
        render:function(data,type,row){
          return data == '1' ? '<span class="label label-success">Active</span>':'<span class="label label-default">Inactive</span>';
        }
      },
      {data: 'created_at', visible:false},
      {data: 'Creator', visible:false},
      {data: 'updated_at', visible:false},
      {data: 'Updater', visible:false},
      {data: 'action',name:'action',orderable:'false'},
    ],
    order:[[0,'desc']]
  });


  // Initiate Languages Trash Table
  var DataTrashTable = $('#DataTrashTable').DataTable({
    dom:'Brf'+'<"row"<"col-sm-2"i><"col-sm-2"l><"col-sm-8"p>>'+'tip',
    buttons:[
      {
        extend:'reload',
        text:'<i class="fa fa-refresh"></i>',
        titleAttr:'Reload'
      },
      {
        extend:'colvis',
        text:'<i class="fa fa-columns"></i>',
        titleAttr:'Columns',
      },
      {
        extend:'copy',
        titleAttr:'Copy to Clipboard',
        text:'<i class="fa fa-copy"></i>',
        exportOptions:{
          columns:':visible'
        }
      },
      {
        extend:'print',
        text:'<i class="fa fa-print"></i>',
        titleAttr:'Print',
        messageTop:'Printed',
        messageBottom:'Printed from Automation Software',
        autoPrint:false,
        exportOptions:{
          columns:':visible'
        }
      },     
      {
        extend:'collection',
        text:'<i class="fa fa-download"></i> <span class="caret"></span>',
        titleAttr:'Export',
        buttons:[
          {
            extend:'excel',
            title:'Language_List',
            text:'Excel',
            exportOptions:{
              columns:':visible'
            },
            filename:function(){ return getExportFileName();}
          },
          {
            extend:'pdfHtml5',
            text:'PDF',
            charset:'utf-8',
            bom:true,
            exportOptions:{
              columns:':visible'
            },
            filename:function(){ return getExportFileName();}
          },
          {
            extend:'csv',
            title:'Language_List',
            text:'CSV',
            exportOptions:{
              columns:':visible'
            },
            filename:function(){ return getExportFileName();}
          },
          {
            extend:'csv',
            title:'Language_List',
            text:'TSV',
            fieldSeparator:'\t',
            extension:'.tsv',
            exportOptions:{
              columns:':visible'
            },
            filename:function(){ return getExportFileName();}
          },          
          {
            text: 'JSON',
            exportOptions:{
              columns:':visible'
            },
            action: function ( e, dt, button, config ) {
              var data = dt.buttons.exportData();

              $.fn.dataTable.fileSave(
                new Blob( [ JSON.stringify( data ) ] ),
                 getExportFileName()
              );
            }
          }
        ],
      }
    ],
    processing: true,
    responsive:true,
    colReorder:true,
    serverSide: true,
    blengthMenu:true,    
    lengthMenu:[[10,20,30,50,100,150,200,500,-1],[10,20,30,50,100,150,200,500,'All']],
    pagingType:'full_numbers',
    language:{
      sLengthMenu:'_MENU_ rows per page',
      paginate: {
        first:    'First',
        previous: 'Previous',
        next:     'Next',
        last:     'Last'
      },
      aria: {
        paginate: {
          first:    'First',
          previous: 'Previous',
          next:     'Next',
          last:     'Last'
        }
      },
      processing:'<strong><i class="fa fa-spinner fa-lg fa-spin"></i> Loading. Please wait...</strong>',
      search:'_INPUT_',
      searchPlaceholder:'Search...',
    },
    stateSave:true,
    ajax: {
      url:TrashURL,
      type:'GET'
    },
    columns: [      
      {data: 'DT_RowIndex', name:'DT_RowIndex',orderable:false,searchable:false, visible:false},
      {data: 'id',name:'id','visible':false},
      {data: 'Name'},
      {data: 'Month'},
      {data: 'Year'},
      {data: 'Institute'},
      {data: 'deleted_at'},
      {data: 'Deleter'},
      {data: 'action',name:'action',orderable:'false'},
    ],
    order:[[0,'desc']]
  });

  // When Delete Button is clicked on each row
  $('body').on('click','#Delete',function(event){
    event.preventDefault();
    var ID = $(this).data('id');
    
    Swal.fire({
      title: 'Are you sure?',
      text: "The Data will be deleted!",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
      if (result.value) {
        $.ajax({
        type:'GET',
        url: DestroyURL + ID,
        success:function(data){
          DataTable.draw(false);         

          Toast.fire({
            icon: 'success',
            title: 'Delete Complete'
          })
        },
        error:function(data){
          console.log('Error:',data);
        }
      });
      }
    })
  });

  // When Delete Button is clicked on each row
  $('body').on('click','#DeleteAll',function(event){ 
    event.preventDefault();

    Swal.fire({
      title: 'Are you sure?',
      text: "All Data will be deleted!",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Yes, delete all!'
    }).then((result) => {
      if (result.value) {
        $.ajax({
        type:'GET',
        url: DestroyURL,
        success:function(data){
          DataTable.draw(false);         

          Toast.fire({
            icon: 'success',
            title: 'All Data Deleted !'
          })
        },
        error:function(data){
          console.log('Error:',data);
        }
      });
      }
    })
  });

  // When Restore button is clicked
  $('body').on('click','#Restore',function(event){
    event.preventDefault();

    var ID = $(this).data('id');
    Swal.fire({
      title: 'Restore this Data?',
      text: "Data will be Restored",
      icon: 'question',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Yes, Restore now'
    }).then((result) => {
      if (result.value) {
        $.ajax({
          type:'GET',
          url: RestoreURL + ID,
          success:function(data){
            DataTrashTable.draw(false);

            Toast.fire({
              icon: 'success',
              title: 'Restored Successfully !'
            })
          },
          error:function(data){
            console.log('Error:',data);
          }
        });
      }
    })    
  });

  // When Parmanent Delete Button is clicked
  $('body').on('click','#Clear',function(event){
    event.preventDefault();

    var ID = $(this).data('id');

    Swal.fire({
      title: 'Delete Parmanently?',
      text: "Data will be Deleted Forever",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Delete Forever'
    }).then((result) => {
      if (result.value) {
        $.ajax({
          type:'GET',
          url: ClearURL + ID,
          success:function(data){
            DataTrashTable.draw(false);

            Toast.fire({
              icon: 'success',
              title: 'Parmanently Deleted the Data !'
            })
          },
          error:function(data){
            console.log('Error:',data);
          }
        });
      }
    })
  });

  // When Restore all Button is clicked
  $('body').on('click','#RestoreAll',function(event){
    event.preventDefault();

    Swal.fire({
      title: 'Restore all ?',
      text: "All Data will be back to the list",
      icon: 'question',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Restore All'
    }).then((result) => {
      if (result.value) {
        $.ajax({
          type:'GET',
          url: RestoreURL,
          success:function(data){
            DataTrashTable.draw(false);

            Toast.fire({
              icon: 'success',
              title: 'Restored Everything !'
            })
          },
          error:function(data){
            console.log('Error:',data);
          }
        });
      }
    })
  });

  // When clear All button is clicked
  $('body').on('click','#Empty',function(event){
    event.preventDefault();
    Swal.fire({
      title: 'Empty Trash ?',
      text: "Everything will be gone forever",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Clear Trash'
    }).then((result) => {
      if (result.value) {
        $.ajax({
          type:'GET',
          url: EmptyURL,
          success:function(data){
            DataTrashTable.draw(false);

            Toast.fire({
              icon: 'success',
              title: 'Whoa! Trash is now Empty.'
            })
          },
          error:function(data){
            console.log('Error:',data);
          }
        });
      }
    })
  });

  // When View  button is clicked
  $('body').on('click','#View',function(event){
    event.preventDefault();
    var ID = $(this).data('id');
    $.ajax({
      type:'GET',
      url: ShowURL + ID,
      success:function(data){
        var Data = JSON.parse(JSON.stringify(data));
        $('.ViewID').text(Data['id']);
        $('.ViewNameEn').text(Data['NameEn']);
        $('.ViewNameBn').text(Data['NameBn']);
        $('.ViewCategory').text(Data['CategoryID']);
        $('.ViewStatus').html(function(){
          return Data['Status'] == '1' ? '<span class="label label-success">Active</span>':'<span class="label label-default">Inactive</span>';
        });
        $('.ViewCreatedAt').text(Data['created_at']);
        $('.ViewCreatedBy').text(Data['created_by']);
        $('.ViewUpdatedAt').text(Data['updated_at']);
        $('.ViewUpdatedBy').text(Data['updated_by']);

        $('#ViewModal').modal().show();
      },
      error:function(data){
          console.log('Error:',data);
        }
      });
    });

  // When Edit button is clicked
  $('body').on('click','#Edit',function(event){
    event.preventDefault();
    var ID = $(this).data('id');

    $.ajax({
      type:'GET',
      url: ShowURL + ID,
      success:function(data){
        $('#EditForm')[0].reset();

        $('#ID').val(data['id']);
        $('#InstituteIDEdit').val(data['InstituteID']);        
        $('#NameEdit').val(data['Name']);
        $('#MonthEdit').val(data['Month']);
        $('#YearEdit').val(data['Year']);
        $('#DateOfStartEdit').val(data['DateOfStart']);
        $('#DateOfEndEdit').val(data['DateOfEnd']);
        $('#StatusEdit').val(data['Status']);

        $('#EditModal').modal('show');
        
        
      },
      error:function(data){
        console.log('Error:',data);
      }
    });
  });

  // When New Form is submitted
  // $('#NewForm').on('submit', function(e){
  //   e.preventDefault();

  //   $.ajax({
  //     type:'POST',
  //     url:StoreURL,
  //     data:$('#NewForm').serialize(),
  //     success:function(data){
  //       $('#NewModal').modal('hide');
  //       $('#NewForm')[0].reset();
  //       DataTable.draw(false);

  //       Toast.fire({
  //         icon: 'success',
  //         title: 'Added Successfully !'
  //       })
  //     },
  //     error:function(data){
  //       console.log('Error :',data);
  //     }
  //   });
  // });

  // When Update Form is submitted
  // $('#EditForm').on('submit', function(e){
  //   e.preventDefault();

  //   $.ajax({
  //     type:'POST',
  //     url:UpdateURL,
  //     data:$('#EditForm').serialize(),
  //     success:function(data){
  //       $('#EditModal').modal('hide');
  //       $('#EditForm')[0].reset();
  //       DataTable.draw(false);
  //       console.log(data);

  //       Toast.fire({
  //         icon: 'success',
  //         title: 'Updated Successfully !'
  //       })
  //     },
  //     error:function(data){
  //       console.log('Error :',data);
  //     }
  //   });
  // });

  // jQuery validator for form NewForm
  $('#NewForm').validate({
    rules:{
      NameEn:{
        required:true,
      },
      NameBn:{
        required:false,
      },
    },
    messages:{
      NameEn:'Please input English Name',
    },
    errorElement: "em",
    errorPlacement: function ( error, element ) {
      // Add the `help-block` class to the error element
      error.addClass( "help-block" );

      // Add `has-feedback` class to the parent div.form-group
      // in order to add icons to inputs
      element.parents( ".feedback" ).addClass( "has-feedback" );

      if ( element.prop( "type" ) === "checkbox" ) {
        error.insertAfter( element.parent( "label" ) );
      } else {
        error.insertAfter( element );
      }

      // Add the span element, if doesn't exists, and apply the icon classes to it.
      if ( !element.next( "span" )[ 0 ] ) {
        $( "<span class='glyphicon glyphicon-remove form-control-feedback'></span>" ).insertAfter( element );
      }
    },
    success: function ( label, element ) {
      // Add the span element, if doesn't exists, and apply the icon classes to it.
      if ( !$( element ).next( "span" )[ 0 ] ) {
        $( "<span class='glyphicon glyphicon-ok form-control-feedback'></span>" ).insertAfter( $( element ) );
      }
    },
    highlight: function ( element, errorClass, validClass ) {
      $( element ).parents( ".feedback" ).addClass( "has-error" ).removeClass( "has-success" );
      $( element ).next( "span" ).addClass( "glyphicon-remove" ).removeClass( "glyphicon-ok" );
    },
    unhighlight: function ( element, errorClass, validClass ) {
      $( element ).parents( ".feedback" ).addClass( "has-success" ).removeClass( "has-error" );
      $( element ).next( "span" ).addClass( "glyphicon-ok" ).removeClass( "glyphicon-remove" );
    }
  });
});