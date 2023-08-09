sudo apt install -y php7.2 php7.2-gd php7.2-dom 
sudo apt install -y php7.2-simplexml php7.2-xml php7.2-xmlreader php7.2-xmlwriter php7.2-zip php7.2-mbstring

cd AldirBlanc/ && composer update && cd ..
cd EvaluationMethodSeplag/ && composer update  && cd ..
cd RegistrationPaymentsAuxilio/ && composer update  && cd ..
cd Report/ && composer update  && cd ..
cd SendEmailUser/ && composer update  && cd ..