 <div class="row justify-content-center">

            {{-- کارت موجودی --}}
            <div class="col-md-12 mb-4">
                <div class="card shadow-lg border-0 rounded-4">
                    <div class="card-body text-center">
                        <h4 class="fw-bold text-primary mb-3">💰 موجودی کیف پول</h4>
                        <h2 class="display-6 text-success fw-bold mb-4">
                            {{ number_format($wallet->balance) }} تومان
                        </h2>

                        <form action="#" method="POST" class="d-flex justify-content-center">
                            @csrf
                            <input type="number" name="amount" class="form-control w-50 me-2"
                                   placeholder="مبلغ به تومان" min="1000" required>
                            <button type="submit" class="btn btn-success px-4">
                                افزایش موجودی
                            </button>
                        </form>
                    </div>
                </div>
            </div>

            {{-- لیست تراکنش‌ها --}}
            <div class="col-md-12">
                <div class="card shadow border-0 rounded-4">
                    <div class="card-header bg-primary text-white text-center fw-bold rounded-top-4">
                        📜 تاریخچه تراکنش‌ها
                    </div>
                    <div class="card-body p-0">
                        @if($transactions->count())
                            <table class="table table-hover mb-0 text-center align-middle">
                                <thead class="table-light">
                                <tr>
                                    <th>تاریخ</th>
                                    <th>مبلغ (تومان)</th>
                                    <th>نوع</th>
                                    <th>توضیحات</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($transactions as $transaction)
                                    <tr>
                                        <td>{{ $transaction->created_at->format('Y/m/d H:i') }}</td>
                                        <td>{{ number_format($transaction->amount) }}</td>
                                        <td>
                                            @if($transaction->type === 'deposit')
                                                <span class="badge bg-success">واریز</span>
                                            @else
                                                <span class="badge bg-danger">برداشت</span>
                                            @endif
                                        </td>
                                        <td>{{ $transaction->description ?? '-' }}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        @else
                            <div class="p-4 text-center text-muted">
                                هنوز هیچ تراکنشی ثبت نشده است.
                            </div>
                        @endif
                    </div>
                </div>
            </div>

        </div>
