<?php

use Symfony\Component\Translation\MessageCatalogue;

$catalogue = new MessageCatalogue('pt_PT', array (
  'security' => 
  array (
    'An authentication exception occurred.' => 'Ocorreu uma excepção durante a autenticação.',
    'Authentication credentials could not be found.' => 'As credenciais de autenticação não foram encontradas.',
    'Authentication request could not be processed due to a system problem.' => 'O pedido de autenticação não foi concluído devido a um problema no sistema.',
    'Invalid credentials.' => 'Credenciais inválidas.',
    'Cookie has already been used by someone else.' => 'Este cookie já está em uso.',
    'Not privileged to request the resource.' => 'Não possui privilégios para aceder a este recurso.',
    'Invalid CSRF token.' => 'Token CSRF inválido.',
    'Digest nonce has expired.' => 'Digest nonce expirado.',
    'No authentication provider found to support the authentication token.' => 'Nenhum fornecedor de autenticação encontrado para suportar o token de autenticação.',
    'No session available, it either timed out or cookies are not enabled.' => 'Não existe sessão disponível, esta expirou ou os cookies estão desativados.',
    'No token could be found.' => 'O token não foi encontrado.',
    'Username could not be found.' => 'Nome de utilizador não encontrado.',
    'Account has expired.' => 'A conta expirou.',
    'Credentials have expired.' => 'As credenciais expiraram.',
    'Account is disabled.' => 'Conta desativada.',
    'Account is locked.' => 'A conta está trancada.',
  ),
));

$cataloguePt = new MessageCatalogue('pt', array (
  'validators' => 
  array (
    'This value should be false.' => 'Este valor deveria ser falso.',
    'This value should be true.' => 'Este valor deveria ser verdadeiro.',
    'This value should be of type {{ type }}.' => 'Este valor deveria ser do tipo {{ type }}.',
    'This value should be blank.' => 'Este valor deveria ser vazio.',
    'The value you selected is not a valid choice.' => 'O valor selecionado não é uma opção válida.',
    'You must select at least {{ limit }} choice.|You must select at least {{ limit }} choices.' => 'Você deveria selecionar {{ limit }} opção no mínimo.|Você deveria selecionar {{ limit }} opções no mínimo.',
    'You must select at most {{ limit }} choice.|You must select at most {{ limit }} choices.' => 'Você deve selecionar, no máximo {{ limit }} opção.|Você deve selecionar, no máximo {{ limit }} opções.',
    'One or more of the given values is invalid.' => 'Um ou mais dos valores introduzidos não são válidos.',
    'This field was not expected.' => 'Este campo não era esperado.',
    'This field is missing.' => 'Este campo está faltando.',
    'This value is not a valid date.' => 'Este valor não é uma data válida.',
    'This value is not a valid datetime.' => 'Este valor não é uma data-hora válida.',
    'This value is not a valid email address.' => 'Este valor não é um endereço de e-mail válido.',
    'The file could not be found.' => 'O arquivo não pôde ser encontrado.',
    'The file is not readable.' => 'O arquivo não pôde ser lido.',
    'The file is too large ({{ size }} {{ suffix }}). Allowed maximum size is {{ limit }} {{ suffix }}.' => 'O arquivo é muito grande ({{ size }} {{ suffix }}). O tamanho máximo permitido é de {{ limit }} {{ suffix }}.',
    'The mime type of the file is invalid ({{ type }}). Allowed mime types are {{ types }}.' => 'O tipo mime do arquivo é inválido ({{ type }}). Os tipos mime permitidos são {{ types }}.',
    'This value should be {{ limit }} or less.' => 'Este valor deveria ser {{ limit }} ou menor.',
    'This value is too long. It should have {{ limit }} character or less.|This value is too long. It should have {{ limit }} characters or less.' => 'O valor é muito longo. Deveria ter {{ limit }} caracteres ou menos.',
    'This value should be {{ limit }} or more.' => 'Este valor deveria ser {{ limit }} ou mais.',
    'This value is too short. It should have {{ limit }} character or more.|This value is too short. It should have {{ limit }} characters or more.' => 'O valor é muito curto. Deveria de ter {{ limit }} caractere ou mais.|O valor é muito curto. Deveria de ter {{ limit }} caracteres ou mais.',
    'This value should not be blank.' => 'Este valor não deveria ser branco/vazio.',
    'This value should not be null.' => 'Este valor não deveria ser nulo.',
    'This value should be null.' => 'Este valor deveria ser nulo.',
    'This value is not valid.' => 'Este valor não é válido.',
    'This value is not a valid time.' => 'Este valor não é uma hora válida.',
    'This value is not a valid URL.' => 'Este valor não é um URL válido.',
    'The two values should be equal.' => 'Os dois valores deveriam ser iguais.',
    'The file is too large. Allowed maximum size is {{ limit }} {{ suffix }}.' => 'O arquivo é muito grande. O tamanho máximo permitido é de {{ limit }} {{ suffix }}.',
    'The file is too large.' => 'O ficheiro é muito grande.',
    'The file could not be uploaded.' => 'Não foi possível carregar o ficheiro.',
    'This value should be a valid number.' => 'Este valor deveria de ser um número válido.',
    'This file is not a valid image.' => 'Este ficheiro não é uma imagem.',
    'This is not a valid IP address.' => 'Este endereço de IP não é válido.',
    'This value is not a valid language.' => 'Este valor não é uma linguagem válida.',
    'This value is not a valid locale.' => 'Este valor não é um \'locale\' válido.',
    'This value is not a valid country.' => 'Este valor não é um País válido.',
    'This value is already used.' => 'Este valor já está a ser usado.',
    'The size of the image could not be detected.' => 'O tamanho da imagem não foi detetado.',
    'The image width is too big ({{ width }}px). Allowed maximum width is {{ max_width }}px.' => 'A largura da imagem ({{ width }}px) é muito grande. A largura máxima da imagem é: {{ max_width }}px.',
    'The image width is too small ({{ width }}px). Minimum width expected is {{ min_width }}px.' => 'A largura da imagem ({{ width }}px) é muito pequena. A largura miníma da imagem é de: {{ min_width }}px.',
    'The image height is too big ({{ height }}px). Allowed maximum height is {{ max_height }}px.' => 'A altura da imagem ({{ height }}px) é muito grande. A altura máxima da imagem é de: {{ max_height }}px.',
    'The image height is too small ({{ height }}px). Minimum height expected is {{ min_height }}px.' => 'A altura da imagem ({{ height }}px) é muito pequena. A altura miníma da imagem é de: {{ min_height }}px.',
    'This value should be the user\'s current password.' => 'Este valor deveria de ser a password atual do utilizador.',
    'This value should have exactly {{ limit }} character.|This value should have exactly {{ limit }} characters.' => 'Este valor tem de ter exatamente {{ limit }} carateres.',
    'The file was only partially uploaded.' => 'Só foi enviado parte do ficheiro.',
    'No file was uploaded.' => 'Nenhum ficheiro foi enviado.',
    'No temporary folder was configured in php.ini.' => 'Não existe nenhum directório temporária configurado no ficheiro php.ini.',
    'Cannot write temporary file to disk.' => 'Não foi possível escrever ficheiros temporários no disco.',
    'A PHP extension caused the upload to fail.' => 'Uma extensão PHP causou a falha no envio.',
    'This collection should contain {{ limit }} element or more.|This collection should contain {{ limit }} elements or more.' => 'Esta coleção deve conter {{ limit }} elemento ou mais.|Esta coleção deve conter {{ limit }} elementos ou mais.',
    'This collection should contain {{ limit }} element or less.|This collection should contain {{ limit }} elements or less.' => 'Esta coleção deve conter {{ limit }} elemento ou menos.|Esta coleção deve conter {{ limit }} elementos ou menos.',
    'This collection should contain exactly {{ limit }} element.|This collection should contain exactly {{ limit }} elements.' => 'Esta coleção deve conter exatamente {{ limit }} elemento.|Esta coleção deve conter exatamente {{ limit }} elementos.',
    'Invalid card number.' => 'Número de cartão inválido.',
    'Unsupported card type or invalid card number.' => 'Tipo de cartão não suportado ou número de cartão inválido.',
    'This is not a valid International Bank Account Number (IBAN).' => 'Este não é um Número Internacional de Conta Bancária (IBAN) válido.',
    'This value is not a valid ISBN-10.' => 'Este valor não é um ISBN-10 válido.',
    'This value is not a valid ISBN-13.' => 'Este valor não é um ISBN-13 válido.',
    'This value is neither a valid ISBN-10 nor a valid ISBN-13.' => 'Este valor não é um ISBN-10 ou ISBN-13 válido.',
    'This value is not a valid ISSN.' => 'Este valor não é um ISSN válido.',
    'This value is not a valid currency.' => 'Este não é um valor monetário válido.',
    'This value should be equal to {{ compared_value }}.' => 'Este valor deve ser igual a {{ compared_value }}.',
    'This value should be greater than {{ compared_value }}.' => 'Este valor deve ser superior a {{ compared_value }}.',
    'This value should be greater than or equal to {{ compared_value }}.' => 'Este valor deve ser igual ou superior a {{ compared_value }}.',
    'This value should be identical to {{ compared_value_type }} {{ compared_value }}.' => 'Este valor deve ser idêntico a {{ compared_value_type }} {{ compared_value }}.',
    'This value should be less than {{ compared_value }}.' => 'Este valor deve ser inferior a {{ compared_value }}.',
    'This value should be less than or equal to {{ compared_value }}.' => 'Este valor deve ser igual ou inferior a {{ compared_value }}.',
    'This value should not be equal to {{ compared_value }}.' => 'Este valor não deve ser igual a {{ compared_value }}.',
    'This value should not be identical to {{ compared_value_type }} {{ compared_value }}.' => 'Este valor não deve ser idêntico a {{ compared_value_type }} {{ compared_value }}.',
    'The image ratio is too big ({{ ratio }}). Allowed maximum ratio is {{ max_ratio }}.' => 'O formato da imagem é muito grande ({{ ratio }}). O formato máximo é {{ max_ratio }}.',
    'The image ratio is too small ({{ ratio }}). Minimum ratio expected is {{ min_ratio }}.' => 'O formato da imagem é muito pequeno ({{ ratio }}). O formato mínimo esperado é {{ min_ratio }}.',
    'The image is square ({{ width }}x{{ height }}px). Square images are not allowed.' => 'A imagem é um quadrado ({{ width }}x{{ height }}px). Imagens quadradas não são permitidas.',
    'The image is landscape oriented ({{ width }}x{{ height }}px). Landscape oriented images are not allowed.' => 'A imagem está orientada à paisagem ({{ width }}x{{ height }}px). Imagens orientadas à paisagem não são permitidas.',
    'The image is portrait oriented ({{ width }}x{{ height }}px). Portrait oriented images are not allowed.' => 'A imagem está orientada ao retrato ({{ width }}x{{ height }}px). Imagens orientadas ao retrato não são permitidas.',
    'An empty file is not allowed.' => 'Ficheiro vazio não é permitido.',
    'This form should not contain extra fields.' => 'Este formulário não deveria conter campos extra.',
    'The uploaded file was too large. Please try to upload a smaller file.' => 'O arquivo enviado é muito grande. Por favor, tente enviar um ficheiro mais pequeno.',
    'The CSRF token is invalid. Please try to resubmit the form.' => 'O token CSRF é inválido. Por favor submeta o formulário novamente.',
    'fos_user.username.already_used' => 'Este utilizador já existe.',
    'fos_user.username.blank' => 'Por favor introduza o nome de utilizador.',
    'fos_user.username.short' => 'O nome de utilizador é muito curto.',
    'fos_user.username.long' => 'O nome de utilizador é muito longo.',
    'fos_user.email.already_used' => 'Este email já está a ser usado.',
    'fos_user.email.blank' => 'Por favor introduza o email.',
    'fos_user.email.short' => 'Este email é muito curto.',
    'fos_user.email.long' => 'Este email é muito longo.',
    'fos_user.email.invalid' => 'Este email é inválido.',
    'fos_user.password.blank' => 'Por favor introduza a senha.',
    'fos_user.password.short' => 'Esta senha é muito curta.',
    'fos_user.password.mismatch' => 'As senhas não correspondem.',
    'fos_user.new_password.blank' => 'Por favor introduza a nova senha.',
    'fos_user.new_password.short' => 'A nova senha é muito curta.',
    'fos_user.current_password.invalid' => 'A senha está incorreta.',
    'fos_user.group.blank' => 'Por favor introduza o nome.',
    'fos_user.group.short' => 'O nome é muito curto.',
    'fos_user.group.long' => 'O nome é muito longo.',
  ),
  'FOSUserBundle' => 
  array (
    'group.edit.submit' => 'Atualizar Grupo',
    'group.show.name' => 'Nome do Grupo',
    'group.new.submit' => 'Criar Grupo',
    'group.flash.updated' => 'O grupo foi atualizado',
    'group.flash.created' => 'O grupo foi criado',
    'group.flash.deleted' => 'O grupo foi apagado',
    'security.login.username' => 'Utilizador',
    'security.login.password' => 'Password',
    'security.login.remember_me' => 'Lembrar-me',
    'security.login.submit' => 'Entrar',
    'profile.show.username' => 'Utilizador',
    'profile.show.email' => 'Email',
    'profile.edit.submit' => 'Atualizar conta',
    'profile.flash.updated' => 'O perfil foi atualizado',
    'change_password.submit' => 'Mudar a password',
    'change_password.flash.success' => 'A password foi alterada',
    'registration.check_email' => 'Foi enviado um email para %email%. Este contém um link de ativação que terá de visitar para ativar a sua conta.',
    'registration.confirmed' => 'Parabéns %username%, a sua conta foi confirmada.',
    'registration.back' => 'Voltar para a página anterior.',
    'registration.submit' => 'Registar',
    'registration.flash.user_created' => 'O utilizador foi criado com sucesso',
    'registration.email.subject' => 'Bem-vindo(a) %username%!',
    'registration.email.message' => 'Olá %username%!

Para completar a validação da sua conta, por favor visite o seguinte link: %confirmationUrl%

Cumprimentos,
A equipa.
',
    'resetting.check_email' => 'Foi enviado um email. Este contém um link que terá de visitar para recuperar a sua password.
Nota: Só poderá voltar a pedir para recuperar a sua password dentro de %tokenLifetime% horas.

Se não receber o email verifique a pasta de spam do seu cliente de email ou tente novamente.
',
    'resetting.request.username' => 'Utilizador ou endereço de email',
    'resetting.request.submit' => 'Recuperar password',
    'resetting.reset.submit' => 'Alterar password',
    'resetting.flash.success' => 'A password foi recuperada com sucesso',
    'resetting.email.subject' => 'Recuperar password',
    'resetting.email.message' => 'Olá %username%!

Para recuperar a password, por favor aceda a %confirmationUrl%

Cumprimentos,
A equipa.
',
    'layout.logout' => 'Sair',
    'layout.login' => 'Entrar',
    'layout.register' => 'Registar',
    'layout.logged_in_as' => 'Entrou como %username%',
    'form.group_name' => 'Nome do Grupo',
    'form.username' => 'Utilizador',
    'form.email' => 'Email',
    'form.current_password' => 'Password atual',
    'form.password' => 'Password',
    'form.password_confirmation' => 'Verificar password',
    'form.new_password' => 'Nova password',
    'form.new_password_confirmation' => 'Verificar a nova password',
  ),
));
$catalogue->addFallbackCatalogue($cataloguePt);
$cataloguePl = new MessageCatalogue('pl', array (
  'validators' => 
  array (
    'This value should be false.' => 'Ta wartość powinna być fałszem.',
    'This value should be true.' => 'Ta wartość powinna być prawdą.',
    'This value should be of type {{ type }}.' => 'Ta wartość powinna być typu {{ type }}.',
    'This value should be blank.' => 'Ta wartość powinna być pusta.',
    'The value you selected is not a valid choice.' => 'Ta wartość powinna być jedną z podanych opcji.',
    'You must select at least {{ limit }} choice.|You must select at least {{ limit }} choices.' => 'Powinieneś wybrać co najmniej {{ limit }} opcję.|Powinieneś wybrać co najmniej {{ limit }} opcje.|Powinieneś wybrać co najmniej {{ limit }} opcji.',
    'You must select at most {{ limit }} choice.|You must select at most {{ limit }} choices.' => 'Powinieneś wybrać maksymalnie {{ limit }} opcję.|Powinieneś wybrać maksymalnie {{ limit }} opcje.|Powinieneś wybrać maksymalnie {{ limit }} opcji.',
    'One or more of the given values is invalid.' => 'Jedna lub więcej z podanych wartości jest nieprawidłowa.',
    'This field was not expected.' => 'Tego pola się nie spodziewano.',
    'This field is missing.' => 'Tego pola brakuje.',
    'This value is not a valid date.' => 'Ta wartość nie jest prawidłową datą.',
    'This value is not a valid datetime.' => 'Ta wartość nie jest prawidłową datą i czasem.',
    'This value is not a valid email address.' => 'Ta wartość nie jest prawidłowym adresem email.',
    'The file could not be found.' => 'Plik nie mógł zostać odnaleziony.',
    'The file is not readable.' => 'Nie można odczytać pliku.',
    'The file is too large ({{ size }} {{ suffix }}). Allowed maximum size is {{ limit }} {{ suffix }}.' => 'Plik jest za duży ({{ size }} {{ suffix }}). Maksymalny dozwolony rozmiar to {{ limit }} {{ suffix }}.',
    'The mime type of the file is invalid ({{ type }}). Allowed mime types are {{ types }}.' => 'Nieprawidłowy typ mime pliku ({{ type }}). Dozwolone typy mime to {{ types }}.',
    'This value should be {{ limit }} or less.' => 'Ta wartość powinna wynosić {{ limit }} lub mniej.',
    'This value is too long. It should have {{ limit }} character or less.|This value is too long. It should have {{ limit }} characters or less.' => 'Ta wartość jest zbyt długa. Powinna mieć {{ limit }} lub mniej znaków.|Ta wartość jest zbyt długa. Powinna mieć {{ limit }} lub mniej znaków.|Ta wartość jest zbyt długa. Powinna mieć {{ limit }} lub mniej znaków.',
    'This value should be {{ limit }} or more.' => 'Ta wartość powinna wynosić {{ limit }} lub więcej.',
    'This value is too short. It should have {{ limit }} character or more.|This value is too short. It should have {{ limit }} characters or more.' => 'Ta wartość jest zbyt krótka. Powinna mieć {{ limit }} lub więcej znaków.|Ta wartość jest zbyt krótka. Powinna mieć {{ limit }} lub więcej znaków.|Ta wartość jest zbyt krótka. Powinna mieć {{ limit }} lub więcej znaków.',
    'This value should not be blank.' => 'Ta wartość nie powinna być pusta.',
    'This value should not be null.' => 'Ta wartość nie powinna być nullem.',
    'This value should be null.' => 'Ta wartość powinna być nullem.',
    'This value is not valid.' => 'Ta wartość jest nieprawidłowa.',
    'This value is not a valid time.' => 'Ta wartość nie jest prawidłowym czasem.',
    'This value is not a valid URL.' => 'Ta wartość nie jest prawidłowym adresem URL.',
    'The two values should be equal.' => 'Obie wartości powinny być równe.',
    'The file is too large. Allowed maximum size is {{ limit }} {{ suffix }}.' => 'Plik jest za duży. Maksymalny dozwolony rozmiar to {{ limit }} {{ suffix }}.',
    'The file is too large.' => 'Plik jest za duży.',
    'The file could not be uploaded.' => 'Plik nie mógł być wgrany.',
    'This value should be a valid number.' => 'Ta wartość powinna być prawidłową liczbą.',
    'This file is not a valid image.' => 'Ten plik nie jest obrazem.',
    'This is not a valid IP address.' => 'To nie jest prawidłowy adres IP.',
    'This value is not a valid language.' => 'Ta wartość nie jest prawidłowym językiem.',
    'This value is not a valid locale.' => 'Ta wartość nie jest prawidłową lokalizacją.',
    'This value is not a valid country.' => 'Ta wartość nie jest prawidłową nazwą kraju.',
    'This value is already used.' => 'Ta wartość jest już wykorzystywana.',
    'The size of the image could not be detected.' => 'Nie można wykryć rozmiaru obrazka.',
    'The image width is too big ({{ width }}px). Allowed maximum width is {{ max_width }}px.' => 'Szerokość obrazka jest zbyt duża ({{ width }}px). Maksymalna dopuszczalna szerokość to {{ max_width }}px.',
    'The image width is too small ({{ width }}px). Minimum width expected is {{ min_width }}px.' => 'Szerokość obrazka jest zbyt mała ({{ width }}px). Oczekiwana minimalna szerokość to {{ min_width }}px.',
    'The image height is too big ({{ height }}px). Allowed maximum height is {{ max_height }}px.' => 'Wysokość obrazka jest zbyt duża ({{ height }}px). Maksymalna dopuszczalna wysokość to {{ max_height }}px.',
    'The image height is too small ({{ height }}px). Minimum height expected is {{ min_height }}px.' => 'Wysokość obrazka jest zbyt mała ({{ height }}px). Oczekiwana minimalna wysokość to {{ min_height }}px.',
    'This value should be the user\'s current password.' => 'Ta wartość powinna być aktualnym hasłem użytkownika.',
    'This value should have exactly {{ limit }} character.|This value should have exactly {{ limit }} characters.' => 'Ta wartość powinna mieć dokładnie {{ limit }} znak.|Ta wartość powinna mieć dokładnie {{ limit }} znaki.|Ta wartość powinna mieć dokładnie {{ limit }} znaków.',
    'The file was only partially uploaded.' => 'Plik został wgrany tylko częściowo.',
    'No file was uploaded.' => 'Żaden plik nie został wgrany.',
    'No temporary folder was configured in php.ini.' => 'Nie skonfigurowano folderu tymczasowego w php.ini, lub skonfigurowany folder nie istnieje.',
    'Cannot write temporary file to disk.' => 'Nie można zapisać pliku tymczasowego na dysku.',
    'A PHP extension caused the upload to fail.' => 'Rozszerzenie PHP spowodowało błąd podczas wgrywania.',
    'This collection should contain {{ limit }} element or more.|This collection should contain {{ limit }} elements or more.' => 'Ten zbiór powinien zawierać {{ limit }} lub więcej elementów.',
    'This collection should contain {{ limit }} element or less.|This collection should contain {{ limit }} elements or less.' => 'Ten zbiór powinien zawierać {{ limit }} lub mniej elementów.',
    'This collection should contain exactly {{ limit }} element.|This collection should contain exactly {{ limit }} elements.' => 'Ten zbiór powinien zawierać dokładnie {{ limit }} element.|Ten zbiór powinien zawierać dokładnie {{ limit }} elementy.|Ten zbiór powinien zawierać dokładnie {{ limit }} elementów.',
    'Invalid card number.' => 'Nieprawidłowy numer karty.',
    'Unsupported card type or invalid card number.' => 'Nieobsługiwany rodzaj karty lub nieprawidłowy numer karty.',
    'This is not a valid International Bank Account Number (IBAN).' => 'Nieprawidłowy międzynarodowy numer rachunku bankowego (IBAN).',
    'This value is not a valid ISBN-10.' => 'Ta wartość nie jest prawidłowym numerem ISBN-10.',
    'This value is not a valid ISBN-13.' => 'Ta wartość nie jest prawidłowym numerem ISBN-13.',
    'This value is neither a valid ISBN-10 nor a valid ISBN-13.' => 'Ta wartość nie jest prawidłowym numerem ISBN-10 ani ISBN-13.',
    'This value is not a valid ISSN.' => 'Ta wartość nie jest prawidłowym numerem ISSN.',
    'This value is not a valid currency.' => 'Ta wartość nie jest prawidłową walutą.',
    'This value should be equal to {{ compared_value }}.' => 'Ta wartość powinna być równa {{ compared_value }}.',
    'This value should be greater than {{ compared_value }}.' => 'Ta wartość powinna być większa niż {{ compared_value }}.',
    'This value should be greater than or equal to {{ compared_value }}.' => 'Ta wartość powinna być większa bądź równa {{ compared_value }}.',
    'This value should be identical to {{ compared_value_type }} {{ compared_value }}.' => 'Ta wartość powinna być identycznego typu {{ compared_value_type }} oraz wartości {{ compared_value }}.',
    'This value should be less than {{ compared_value }}.' => 'Ta wartość powinna być mniejsza niż {{ compared_value }}.',
    'This value should be less than or equal to {{ compared_value }}.' => 'Ta wartość powinna być mniejsza bądź równa {{ compared_value }}.',
    'This value should not be equal to {{ compared_value }}.' => 'Ta wartość nie powinna być równa {{ compared_value }}.',
    'This value should not be identical to {{ compared_value_type }} {{ compared_value }}.' => 'Ta wartość nie powinna być identycznego typu {{ compared_value_type }} oraz wartości {{ compared_value }}.',
    'The image ratio is too big ({{ ratio }}). Allowed maximum ratio is {{ max_ratio }}.' => 'Proporcje obrazu są zbyt duże ({{ ratio }}). Maksymalne proporcje to {{ max_ratio }}.',
    'The image ratio is too small ({{ ratio }}). Minimum ratio expected is {{ min_ratio }}.' => 'Proporcje obrazu są zbyt małe ({{ ratio }}). Minimalne proporcje to {{ min_ratio }}.',
    'The image is square ({{ width }}x{{ height }}px). Square images are not allowed.' => 'Obraz jest kwadratem ({{ width }}x{{ height }}px). Kwadratowe obrazy nie są akceptowane.',
    'The image is landscape oriented ({{ width }}x{{ height }}px). Landscape oriented images are not allowed.' => 'Obraz jest panoramiczny ({{ width }}x{{ height }}px). Panoramiczne zdjęcia nie są akceptowane.',
    'The image is portrait oriented ({{ width }}x{{ height }}px). Portrait oriented images are not allowed.' => 'Obraz jest portretowy ({{ width }}x{{ height }}px). Portretowe zdjęcia nie są akceptowane.',
    'An empty file is not allowed.' => 'Plik nie może być pusty.',
    'The host could not be resolved.' => 'Nazwa hosta nie została rozpoznana.',
    'This value does not match the expected {{ charset }} charset.' => 'Ta wartość nie pasuje do oczekiwanego zestawu znaków {{ charset }}.',
    'This is not a valid Business Identifier Code (BIC).' => 'Ta wartość nie jest poprawnym kodem BIC (Business Identifier Code).',
    'This form should not contain extra fields.' => 'Ten formularz nie powinien zawierać dodatkowych pól.',
    'The uploaded file was too large. Please try to upload a smaller file.' => 'Wgrany plik był za duży. Proszę spróbować wgrać mniejszy plik.',
    'The CSRF token is invalid. Please try to resubmit the form.' => 'Token CSRF jest nieprawidłowy. Proszę spróbować wysłać formularz ponownie.',
    'fos_user.username.already_used' => 'Ta nazwa użytkownika jest już zajęta.',
    'fos_user.username.blank' => 'Proszę podać nazwę użytkownika.',
    'fos_user.username.short' => 'Nazwa użytkownika jest za krótka.',
    'fos_user.username.long' => 'Nazwa użytkownika jest za długa.',
    'fos_user.email.already_used' => 'Podany email jest zajęty.',
    'fos_user.email.blank' => 'Proszę podać adres email.',
    'fos_user.email.short' => 'Podany email jest za krótki.',
    'fos_user.email.long' => 'Podany email jest za długi.',
    'fos_user.email.invalid' => 'Podany adres email jest nieprawidłowy.',
    'fos_user.password.blank' => 'Proszę podać hasło.',
    'fos_user.password.short' => 'Podane hasło jest za krótkie.',
    'fos_user.password.mismatch' => 'Hasła nie pasują do siebie.',
    'fos_user.new_password.blank' => 'Proszę podać nowe hasło.',
    'fos_user.new_password.short' => 'Podane nowe hasło jest za krótkie.',
    'fos_user.current_password.invalid' => 'Podane hasło jest nieprawidłowe.',
    'fos_user.group.blank' => 'Proszę podać nazwę.',
    'fos_user.group.short' => 'Podana nazwa jest za krótka.',
    'fos_user.group.long' => 'Podana nazwa jest za długa.',
  ),
  'security' => 
  array (
    'An authentication exception occurred.' => 'Wystąpił błąd uwierzytelniania.',
    'Authentication credentials could not be found.' => 'Dane uwierzytelniania nie zostały znalezione.',
    'Authentication request could not be processed due to a system problem.' => 'Żądanie uwierzytelniania nie mogło zostać pomyślnie zakończone z powodu problemu z systemem.',
    'Invalid credentials.' => 'Nieprawidłowe dane.',
    'Cookie has already been used by someone else.' => 'To ciasteczko jest używane przez kogoś innego.',
    'Not privileged to request the resource.' => 'Brak uprawnień dla żądania wskazanego zasobu.',
    'Invalid CSRF token.' => 'Nieprawidłowy token CSRF.',
    'Digest nonce has expired.' => 'Kod dostępu wygasł.',
    'No authentication provider found to support the authentication token.' => 'Nie znaleziono mechanizmu uwierzytelniania zdolnego do obsługi przesłanego tokenu.',
    'No session available, it either timed out or cookies are not enabled.' => 'Brak danych sesji, sesja wygasła lub ciasteczka nie są włączone.',
    'No token could be found.' => 'Nie znaleziono tokenu.',
    'Username could not be found.' => 'Użytkownik o podanej nazwie nie istnieje.',
    'Account has expired.' => 'Konto wygasło.',
    'Credentials have expired.' => 'Dane uwierzytelniania wygasły.',
    'Account is disabled.' => 'Konto jest wyłączone.',
    'Account is locked.' => 'Konto jest zablokowane.',
  ),
  'FOSUserBundle' => 
  array (
    'group.edit.submit' => 'Edytuj grupę',
    'group.show.name' => 'Nazwa grupy',
    'group.new.submit' => 'Utwórz grupę',
    'group.flash.updated' => 'Grupa została zaktualizowana.',
    'group.flash.created' => 'Grupa została utworzona.',
    'group.flash.deleted' => 'Grupa została usunięta.',
    'security.login.username' => 'Nazwa użytkownika',
    'security.login.password' => 'Hasło',
    'security.login.remember_me' => 'Nie wylogowuj mnie',
    'security.login.submit' => 'Zaloguj',
    'profile.show.username' => 'Nazwa użytkownika',
    'profile.show.email' => 'E-mail',
    'profile.edit.submit' => 'Edytuj użytkownika',
    'profile.flash.updated' => 'Zapisano zmiany w profilu.',
    'change_password.submit' => 'Zmień hasło',
    'change_password.flash.success' => 'Hasło zostało zmienione.',
    'registration.check_email' => 'Na adres %email% wysłano wiadomość e-mail. Zawiera ona link, na który należy kliknąć, aby aktywować konto.',
    'registration.confirmed' => 'Gratulacje %username%, potwierdziłeś konto.',
    'registration.back' => 'Powrót do poprzedniej strony.',
    'registration.submit' => 'Zarejestruj',
    'registration.flash.user_created' => 'Stworzono użytkownika.',
    'registration.email.subject' => 'Witaj %username%!',
    'registration.email.message' => 'Cześć %username%!

Aby potwierdzić swoje konto - proszę przejść do %confirmationUrl%

Pozdrawiamy,
Zespół.
',
    'resetting.check_email' => 'E-mail został wysłany. Zawiera on link do formularza zmiany hasła.
Uwaga: Możesz zresetować hasło tylko jeden raz w ciągu %tokenLifetime% godzin.

Sprawdź swoją skrzynkę pocztową, jeśli jednak nie widzisz wiadomości od nas, sprawdź folder spam lub spróbuj ponownie później.
',
    'resetting.request.username' => 'Nazwa użytkownika lub e-mail',
    'resetting.request.submit' => 'Resetuj hasło',
    'resetting.reset.submit' => 'Zmień hasło',
    'resetting.flash.success' => 'Hasło zostało zresetowane.',
    'resetting.email.subject' => 'Resetowanie hasła',
    'resetting.email.message' => 'Cześć %username%!

Aby zresetować hasło - proszę przejść do %confirmationUrl%

Pozdrawiamy,
Zespół.
',
    'layout.logout' => 'Wyloguj',
    'layout.login' => 'Zaloguj',
    'layout.register' => 'Zarejestruj',
    'layout.logged_in_as' => 'Zalogowano jako %username%',
    'form.group_name' => 'Nazwa grupy',
    'form.username' => 'Nazwa użytkownika',
    'form.email' => 'E-mail',
    'form.current_password' => 'Obecne hasło',
    'form.password' => 'Hasło',
    'form.password_confirmation' => 'Powtórz hasło',
    'form.new_password' => 'Nowe hasło',
    'form.new_password_confirmation' => 'Powtórz hasło',
  ),
  'KnpPaginatorBundle' => 
  array (
    'label_previous' => 'Poprzednia',
    'label_next' => 'Następna',
  ),
));
$cataloguePt->addFallbackCatalogue($cataloguePl);

return $catalogue;
