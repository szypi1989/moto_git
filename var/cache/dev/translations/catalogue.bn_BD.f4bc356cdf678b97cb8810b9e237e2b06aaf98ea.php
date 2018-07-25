<?php

use Symfony\Component\Translation\MessageCatalogue;

$catalogue = new MessageCatalogue('bn_BD', array (
  'FOSUserBundle' => 
  array (
    'group.edit.submit' => 'আপডেট গ্রুপ',
    'group.show.name' => 'গ্রুপের নাম',
    'group.new.submit' => 'গ্রুপ তৈরি',
    'group.flash.updated' => 'গ্রুপের তথ্য হালনাগাদ হয়েছে',
    'group.flash.created' => 'গ্রুপের তথ্য তৈরি করা হয়েছে',
    'group.flash.deleted' => 'গ্রুপের তথ্য মুছে ফেলা হয়েছে',
    'security.login.username' => 'ব্যবহারকারীর নাম',
    'security.login.password' => 'পাসওয়ার্ড',
    'security.login.remember_me' => 'আমাকে মনে রেখো',
    'security.login.submit' => 'লগ ইন',
    'profile.show.username' => 'ব্যবহারকারীর নাম',
    'profile.show.email' => 'ই-মেইল',
    'profile.edit.submit' => 'আপডেট',
    'profile.flash.updated' => 'প্রোফাইল আপডেট করা হয়েছে।',
    'change_password.submit' => 'পাসওয়ার্ড পরিবর্তন',
    'change_password.flash.success' => 'পাসওয়ার্ড পরিবর্তন সফল হয়েছো',
    'registration.check_email' => '%email% এড্রেসে একটি ই-মেইল পাঠানো হয়েছে. অ্যাকাউন্ট সক্রিয় করার জন্য ই-মেইলে পাঠানো লিংকটি ক্লিক করুন
',
    'registration.confirmed' => '%username% অভিনন্দন, আপনার অ্যাকাউন্ট এখন সক্রিয়।',
    'registration.back' => 'আগের পাতা',
    'registration.submit' => 'নিবন্ধন',
    'registration.flash.user_created' => 'ব্যবহারকারী সফলভাবে তৈরি করা হয়েছে',
    'registration.email.subject' => 'স্বাগতম %username%!',
    'registration.email.message' => 'হ্যালো %username%!

আপনার অ্যাকাউন্ট সক্রিয় করার জন্য - দয়া করে %confirmationUrl% লিংকটি ভিসিট করুর

এই লিঙ্কটি শুধুমাত্র একবার আপনার অ্যাকাউন্ট যাচাই করতে ব্যবহার করা যেতে পারে।

শুভেচ্চান্তে,
এডমিন।
',
    'resetting.check_email' => 'একটি ই-মেইল পাঠানো হয়েছে। পাসওয়ার্ড রিসেট করার জন্য ই-মেইলে পাঠানো লিংকটি ক্লিক করুন।
বিঃদ্রঃ  %tokenLifetime% ঘন্টার মধ্যে শুধুমাত্র একবার রিসেট পাসওয়ার্ড করতে পারবেন।

যদি ই-মেইল টি না পেয়ে থাকেন, তাহলে আপসার স্পাম ফোল্ডারে দেখুন অথবা আবার চেষ্টা করুন।
',
    'resetting.request.username' => 'ব্যবহারকারীর নাম অথবা ই-মেইল',
    'resetting.request.submit' => 'রিসেট পাসওয়ার্ড',
    'resetting.reset.submit' => 'পাসওয়ার্ড পরিবর্তন',
    'resetting.flash.success' => 'পাসওয়ার্ডটি সফলভাবো রিসেট করা হয়েছে',
    'resetting.email.subject' => 'রিসেট পাসওয়ার্ড',
    'resetting.email.message' => 'হ্যালো %username%!

আপনার পাসওয়ার্ড রিসেট করতে - দয়া করে %confirmationUrl% লিংকটি ভিসিট করুর

শুভেচ্চান্তে,
এডমিন।
',
    'layout.logout' => 'লগ আউট',
    'layout.login' => 'লগ ইন',
    'layout.register' => 'নিবন্ধন',
    'layout.logged_in_as' => '%username% হিসাবে লগ ইন করেছেন',
    'form.group_name' => 'গ্রুপের নাম',
    'form.username' => 'ব্যবহারকারীর নাম',
    'form.email' => 'ই-মেইল',
    'form.current_password' => 'বর্তমান পাসওয়ার্ড',
    'form.password' => 'পাসওয়ার্ড',
    'form.password_confirmation' => 'পাসওয়ার্ড আবার লিখুন',
    'form.new_password' => 'নতুন পাসওয়ার্ড',
    'form.new_password_confirmation' => 'নতুন পাসওয়ার্ড আবার লিখুন',
  ),
  'validators' => 
  array (
    'fos_user.username.already_used' => 'ব্যবহারকারীর নামটি ইতিমধ্যে ব্যবহার করা হয়েছে',
    'fos_user.username.blank' => 'অনুগ্রহ করে ব্যবহারকারীর নাম লিখুন',
    'fos_user.username.short' => 'নামটি থুবই ছোট',
    'fos_user.username.long' => 'নামটি থুবই বড়',
    'fos_user.email.already_used' => 'ই-মেইল টি ইতিমধ্যে ব্যবহার করা হয়েছে',
    'fos_user.email.blank' => 'অনুগ্রহ করে একটি ই-মেইল লিখুন',
    'fos_user.email.short' => 'ই-মেইল টি থুবই ছোট',
    'fos_user.email.long' => 'ই-মেইল টি থুবই বড়',
    'fos_user.email.invalid' => 'ই-মেইল টি সঠিক নয়',
    'fos_user.password.blank' => 'অনুগ্রহ করে পাসওয়ার্ড লিখুন',
    'fos_user.password.short' => 'পাসওয়ার্ড টি থুবই ছোট',
    'fos_user.password.mismatch' => 'পাসওয়ার্ডটি মেলেনি',
    'fos_user.new_password.blank' => 'অনুগ্রহ করে একটি নতুন পাসওয়ার্ড লিখুন',
    'fos_user.new_password.short' => 'নতুন পাসওয়ার্ড টি থুবই ছোট',
    'fos_user.current_password.invalid' => 'পাসওয়ার্ডটি সঠিক নয়',
    'fos_user.group.blank' => 'অনুগ্রহ করে একটি নাম লিখুন',
    'fos_user.group.short' => 'নামটি থুবই ছোট',
    'fos_user.group.long' => 'নামটি থুবই বড়',
    'fos_group.name.already_used' => 'নামটি ইতিমধ্যে ব্যবহার করা হয়েছে',
  ),
));

$catalogueBn = new MessageCatalogue('bn', array (
  'FOSUserBundle' => 
  array (
    'group.edit.submit' => 'আপডেট গ্রুপ',
    'group.show.name' => 'গ্রুপের নাম',
    'group.new.submit' => 'গ্রুপ তৈরি',
    'group.flash.updated' => 'গ্রুপের তথ্য হালনাগাদ হয়েছে',
    'group.flash.created' => 'গ্রুপের তথ্য তৈরি করা হয়েছে',
    'group.flash.deleted' => 'গ্রুপের তথ্য মুছে ফেলা হয়েছে',
    'security.login.username' => 'ব্যবহারকারীর নাম',
    'security.login.password' => 'পাসওয়ার্ড',
    'security.login.remember_me' => 'আমাকে মনে রেখো',
    'security.login.submit' => 'লগ ইন',
    'profile.show.username' => 'ব্যবহারকারীর নাম',
    'profile.show.email' => 'ই-মেইল',
    'profile.edit.submit' => 'আপডেট',
    'profile.flash.updated' => 'প্রোফাইল আপডেট করা হয়েছে।',
    'change_password.submit' => 'পাসওয়ার্ড পরিবর্তন',
    'change_password.flash.success' => 'পাসওয়ার্ড পরিবর্তন সফল হয়েছো',
    'registration.check_email' => '%email% এড্রেসে একটি ই-মেইল পাঠানো হয়েছে. অ্যাকাউন্ট সক্রিয় করার জন্য ই-মেইলে পাঠানো লিংকটি ক্লিক করুন
',
    'registration.confirmed' => '%username% অভিনন্দন, আপনার অ্যাকাউন্ট এখন সক্রিয়।',
    'registration.back' => 'আগের পাতা',
    'registration.submit' => 'নিবন্ধন',
    'registration.flash.user_created' => 'ব্যবহারকারী সফলভাবে তৈরি করা হয়েছে',
    'registration.email.subject' => 'স্বাগতম %username%!',
    'registration.email.message' => 'হ্যালো %username%!

আপনার অ্যাকাউন্ট সক্রিয় করার জন্য - দয়া করে %confirmationUrl% লিংকটি ভিসিট করুর

এই লিঙ্কটি শুধুমাত্র একবার আপনার অ্যাকাউন্ট যাচাই করতে ব্যবহার করা যেতে পারে।

শুভেচ্চান্তে,
এডমিন।
',
    'resetting.check_email' => 'একটি ই-মেইল পাঠানো হয়েছে। পাসওয়ার্ড রিসেট করার জন্য ই-মেইলে পাঠানো লিংকটি ক্লিক করুন।
বিঃদ্রঃ  %tokenLifetime% ঘন্টার মধ্যে শুধুমাত্র একবার রিসেট পাসওয়ার্ড করতে পারবেন।

যদি ই-মেইল টি না পেয়ে থাকেন, তাহলে আপসার স্পাম ফোল্ডারে দেখুন অথবা আবার চেষ্টা করুন।
',
    'resetting.request.username' => 'ব্যবহারকারীর নাম অথবা ই-মেইল',
    'resetting.request.submit' => 'রিসেট পাসওয়ার্ড',
    'resetting.reset.submit' => 'পাসওয়ার্ড পরিবর্তন',
    'resetting.flash.success' => 'পাসওয়ার্ডটি সফলভাবো রিসেট করা হয়েছে',
    'resetting.email.subject' => 'রিসেট পাসওয়ার্ড',
    'resetting.email.message' => 'হ্যালো %username%!

আপনার পাসওয়ার্ড রিসেট করতে - দয়া করে %confirmationUrl% লিংকটি ভিসিট করুর

শুভেচ্চান্তে,
এডমিন।
',
    'layout.logout' => 'লগ আউট',
    'layout.login' => 'লগ ইন',
    'layout.register' => 'নিবন্ধন',
    'layout.logged_in_as' => '%username% হিসাবে লগ ইন করেছেন',
    'form.group_name' => 'গ্রুপের নাম',
    'form.username' => 'ব্যবহারকারীর নাম',
    'form.email' => 'ই-মেইল',
    'form.current_password' => 'বর্তমান পাসওয়ার্ড',
    'form.password' => 'পাসওয়ার্ড',
    'form.password_confirmation' => 'পাসওয়ার্ড আবার লিখুন',
    'form.new_password' => 'নতুন পাসওয়ার্ড',
    'form.new_password_confirmation' => 'নতুন পাসওয়ার্ড আবার লিখুন',
  ),
  'validators' => 
  array (
    'fos_user.username.already_used' => 'ব্যবহারকারীর নামটি ইতিমধ্যে ব্যবহার করা হয়েছে',
    'fos_user.username.blank' => 'অনুগ্রহ করে ব্যবহারকারীর নাম লিখুন',
    'fos_user.username.short' => 'নামটি থুবই ছোট',
    'fos_user.username.long' => 'নামটি থুবই বড়',
    'fos_user.email.already_used' => 'ই-মেইল টি ইতিমধ্যে ব্যবহার করা হয়েছে',
    'fos_user.email.blank' => 'অনুগ্রহ করে একটি ই-মেইল লিখুন',
    'fos_user.email.short' => 'ই-মেইল টি থুবই ছোট',
    'fos_user.email.long' => 'ই-মেইল টি থুবই বড়',
    'fos_user.email.invalid' => 'ই-মেইল টি সঠিক নয়',
    'fos_user.password.blank' => 'অনুগ্রহ করে পাসওয়ার্ড লিখুন',
    'fos_user.password.short' => 'পাসওয়ার্ড টি থুবই ছোট',
    'fos_user.password.mismatch' => 'পাসওয়ার্ডটি মেলেনি',
    'fos_user.new_password.blank' => 'অনুগ্রহ করে একটি নতুন পাসওয়ার্ড লিখুন',
    'fos_user.new_password.short' => 'নতুন পাসওয়ার্ড টি থুবই ছোট',
    'fos_user.current_password.invalid' => 'পাসওয়ার্ডটি সঠিক নয়',
    'fos_user.group.blank' => 'অনুগ্রহ করে একটি নাম লিখুন',
    'fos_user.group.short' => 'নামটি থুবই ছোট',
    'fos_user.group.long' => 'নামটি থুবই বড়',
    'fos_group.name.already_used' => 'নামটি ইতিমধ্যে ব্যবহার করা হয়েছে',
  ),
));
$catalogue->addFallbackCatalogue($catalogueBn);
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
$catalogueBn->addFallbackCatalogue($cataloguePl);

return $catalogue;
