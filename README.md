# API de Gerenciamento de Médicos, Pacientes e Cidades
Esta é uma API desenvolvida em Laravel que permite gerenciar médicos, pacientes e cidades em um sistema de saúde. A API oferece endpoints para listar, cadastrar e atualizar informações sobre médicos, pacientes e cidades. A autenticação é feita através do JWT (JSON Web Token), permitindo que certas operações sejam acessíveis apenas para usuários autenticados.

## Pré-requisitos

- `PHP >= 7.4
- `Laravel 8.x
- `Docker
- `Composer (para instalação de dependências)
- `Banco de dados MySQL

## Rotas da API
### https:localhost
    ### Autenticação
A autenticação é necessária para acessar as rotas protegidas da API. A autenticação pode ser realizada enviando um token de autenticação válido no cabeçalho `Authorization` da solicitação. A autenticação é feita através de um token JWT. Para acessar os endpoints que exigem autenticação, você deve incluir o token no cabeçalho de autorização da requisição no formato Bearer <token>.

Para isso precisa cadastrar um usuário : POST /user

Corpo da solicitação:

{
  "name": "Nome do Usuário",
  "email": "email@example.com",
  "password": "senha123"
}

- Para fazer o login do usuário: POST /login
{
  "email": "email@example.com",
  "password": "senha123"
}

- Para fazer o logout do usuário: POST /logout
  
- `POST /api/login: Realiza o login do usuário e retorna um token JWT para autenticação nas rotas protegidas.
- `POST /api/logout: Realiza saída do usuário autenticado.
- `POST /api/users: Cadastra um novo usuario.

        ### Cidades
- `GET /api/cidades: Lista todas as cidades cadastradas.

        ### Médicos
- `GET /api/doctors: Lista todos os médicos cadastrados.
- `GET /api/cities/{id_city}/doctors: Lista os médicos de uma cidade específica.
- `POST /api/doctors: Cadastra um novo médico (requer autenticação).
Corpo da solicitação:
{
  "name": "Carlos Alberto",
  "specialty": "Cardiologista",
  "city_id": 1
}
  
- `POST /api/doctors/{id_doctor}/patients: Vincula um paciente a um médico (requer autenticação).
Corpo da solicitação:
{
  "doctor_id": 1,
  "patient_id": 1,
}

### Pacientes
- `GET /api/doctors/{id_doctor}/patients: Lista os pacientes vinculados a um médico específico (requer autenticação).
- `PUT /api/patients/{id_patient}: Atualiza os dados de um paciente (requer autenticação).
  Corpo da solicitação:
{
  "name": "Felipe guto",
  "phone": "(12)9333-2222"
}

- `POST /api/patients: Cadastra um novo paciente (requer autenticação).
Corpo da solicitação:
{
  "name": "Felipe Augusto",
  "cpf": "123.456.789-00",
  "phone": "(12)9888-8888"
}
