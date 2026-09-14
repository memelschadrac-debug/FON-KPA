<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Mail\MessageReplyMail;
use App\Models\Message;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\View\View;

class MessageController extends Controller
{
    /**
     * Afficher la liste des messages.
     */
    public function index(): View
    {
        $messages = Message::latest()->get();

        return view('admin.messages.index', compact('messages'));
    }

    /**
     * Afficher un message.
     */
    public function show(Message $message): View
    {
        return view('admin.messages.show', compact('message'));
    }

    /**
     * Modifier le statut d'un message.
     */
    public function update(Request $request, Message $message): RedirectResponse
    {
        $action = $request->input('action');

        if ($action === 'read') {
            $message->update([
                'status' => 'read',
                'read_at' => now(),
            ]);

            return redirect()
                ->route('admin.messages.index')
                ->with('success', 'Le message a été marqué comme lu.');
        }

        if ($action === 'archive') {
            $message->update([
                'status' => 'archived',
            ]);

            return redirect()
                ->route('admin.messages.index')
                ->with('success', 'Le message a été archivé.');
        }

        return redirect()
            ->route('admin.messages.index')
            ->with('error', 'Action non reconnue.');
    }

    /**
     * Envoyer une réponse au client.
     */
    public function reply(Request $request, Message $message): RedirectResponse
    {
        $validated = $request->validate([
            'subject' => [
                'required',
                'string',
                'max:150',
            ],
            'reply_message' => [
                'required',
                'string',
                'max:5000',
            ],
        ]);

        try {
            Mail::to($message->email)->send(
                new MessageReplyMail(
                    replySubject: $validated['subject'],
                    replyBody: $validated['reply_message'],
                    customerMessage: $message,
                )
            );

            if ($message->status === 'unread') {
                $message->update([
                    'status' => 'read',
                    'read_at' => now(),
                ]);
            }

            return redirect()
                ->route('admin.messages.show', $message)
                ->with(
                    'success',
                    'Votre réponse a été envoyée avec succès à ' . $message->email . '.'
                );

        } catch (\Throwable $e) {

            return redirect()
                ->back()
                ->withInput()
                ->with(
                    'error',
                    'Erreur Resend/Laravel : ' . $e->getMessage()
                );
        }
    }

    /**
     * Supprimer un message.
     */
    public function destroy(Message $message): RedirectResponse
    {
        $message->delete();

        return redirect()
            ->route('admin.messages.index')
            ->with('success', 'Le message a été supprimé avec succès.');
    }
}