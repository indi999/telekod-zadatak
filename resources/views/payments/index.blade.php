@extends('layouts.app')

@section('content')


    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Payments DataTable</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>First name</th>
                    <th>Last name</th>
                    <th>Address</th>
                    <th>Date of birth</th>
                    <th>Payment</th>
                </tr>
                </thead>
                <tbody>
                <?php $sumaOfPayments = 0 ?>
                @forelse($payments as $payment)
                    <tr role="row" class="odd">
                        <td>{{ $payment['id'] }}</td>
                        <td>{{ $payment['first_name'] }}</td>
                        <td>{{ $payment['last_name'] }}</td>
                        <td><a href="" data-toggle="modal" data-target="#modal-sm1{{$payment['id']}}">{{ $payment['address'] }}</a></td>
                        <td>{{ $payment['date_of_birth'] }}</td>
                        <td><a href="" data-toggle="modal" data-target="#modal-sm2{{$payment['id']}}">{{ substr($payment['payment'], 3) }}&euro;</a></td>
                    <?php $sumaOfPayments += floatval(substr($payment['payment'], 3)); ?>
                    </tr>

                    <!-- Modal address-->
                    <div class="modal fade" id="modal-sm1{{$payment['id']}}">
                        <div class="modal-dialog modal-sm">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title">Edit address</h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <form method="POST" action="payments/{{ $payment['id']-1 }}/address" enctype="multipart/form-data" data-parsley-validate="">
                                    @method('PATCH')
                                    @csrf
                                    <div class="modal-body">
                                        <div class="form-wrapper">
                                            <label for="payment">{{ __('Address*') }}</label>
                                            <input type="text" class="form-control input"
                                                   name="address" value="{{$payment['address']}}" data-parsley-trigger="keyup" parsley-required="true"  parsley-maxlength="25" required>
                                            @error('address')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="modal-footer justify-content-between">
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary">Save changes</button>
                                    </div>
                                </form>
                            </div>
                            <!-- /.modal-content -->
                        </div>
                        <!-- /.modal-dialog -->
                    </div>
                    <!-- /.modal -->

                    <!-- Modal payments-->
                    <div class="modal fade" id="modal-sm2{{$payment['id']}}">
                        <div class="modal-dialog modal-sm">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title">Edit Payments</h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <form method="POST" action="payments/{{ $payment['id']-1 }}/payment" enctype="multipart/form-data" data-parsley-validate="">
                                    @method('PATCH')
                                    @csrf
                                    <div class="modal-body">
                                        <div class="form-wrapper">
                                            <label for="payment">{{ __('Payment*') }}&euro;</label>
                                            <input type="text" class="form-control input"
                                                   name="payment" value="{{ substr($payment['payment'], 3) }}" data-parsley-trigger="keyup" parsley-required="true"  parsley-maxlength="25" required>
                                            @error('payment')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="modal-footer justify-content-between">
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary">Save changes</button>
                                    </div>
                                </form>
                            </div>
                            <!-- /.modal-content -->
                        </div>
                        <!-- /.modal-dialog -->
                    </div>
                    <!-- /.modal -->
                @empty
                    <tr role="row" class="odd">
                        <td>{{ "No data in table" }}</td>
                    </tr>
                @endforelse
                </tbody>
                <tfoot>
                <tr>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th>Total:</th>
                    <th>{{ $sumaOfPayments }}&euro;</th>
                </tr>
                </tfoot>
            </table>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->
@endsection
