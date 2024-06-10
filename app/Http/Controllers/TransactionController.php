<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaction;
use Barryvdh\DomPDF\Facade\Pdf;


class TransactionController extends Controller
{
    public function index()
    {
        $transactions = Transaction::all();

        return view('transaction.transaction', compact('transactions'));
    }

    public function cetak()
    {
        $transaction = Transaction::all();
        $pdf = Pdf::loadview('transaction.transaction-cetak', compact('transaction'));
        return $pdf->download('laporan-transaksi.pdf');
    }


}

