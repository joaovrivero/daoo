<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class LoginController extends Controller
{
    public function login(LoginRequest $request)
    {
        try {
            $user = User::where('email', $request->email)->first();
    
            // Verifica se o usuário existe e se a senha está correta
            if (!$user || !Hash::check($request->password, $user->password)) {
                return response()->json(['error' => 'Credenciais inválidas.'], 401); // Retorna erro de credenciais
            }
    
            // Cria o token de autenticação
            $response = $user->createToken($request->email)->plainTextToken;
    
            return response()->json(['token' => $response], 200); // Retorna o token gerado
        } catch (\Exception $error) {
            // Captura erros inesperados
            return response()->json(['error' => $error->getMessage()], 500);
        }
    }

    public function logout(Request $request){
        try{
            $request->user()->tokens()->delete();
            return response()->json(['message' => 'Logout realizado com sucesso!!!']);
        }catch(Exception $error){
            $this->errorHandler('Erro ao realizar logout!!!',$error);
        }
    }
}
