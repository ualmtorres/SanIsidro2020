#/bin/bash
kubectl delete -f services.yml
kubectl delete -f deployment-sgapp.yml
kubectl delete -f deployment-sgapi.yml
kubectl delete -f deployment-sgbd.yml

