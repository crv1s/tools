# -*- coding: utf-8 -*-

print("")
print("")

print("        <--------------------/-------------------\------------------>")
print("       <--------------------/------- crv1s -------\------------------>")
print("      <--------------------/-----------------------\------------------>")
print("")
print("    / ██╗██████╗░░░░░░░░██████╗██╗░░░░░░█████╗░██╗░░░██╗███████╗██████╗░ \ ")
print("   /  ██║██╔══██╗░░░░░░██╔════╝██║░░░░░██╔══██╗╚██╗░██╔╝██╔════╝██╔══██╗  \ ")
print("  /   ██║██████╔╝█████╗╚█████╗░██║░░░░░███████║░╚████╔╝░█████╗░░██████╔╝   \ ")
print("  \   ██║██╔═══╝░╚════╝░╚═══██╗██║░░░░░██╔══██║░░╚██╔╝░░██╔══╝░░██╔══██╗   / ")
print("   \  ██║██║░░░░░░░░░░░██████╔╝███████╗██║░░██║░░░██║░░░███████╗██║░░██║  / ")
print("    \ ╚═╝╚═╝░░░░░░░░░░░╚═════╝░╚══════╝╚═╝░░╚═╝░░░╚═╝░░░╚══════╝╚═╝░░╚═╝ / ")
print("")
print("      <--------------------\-----------------------/------------------>")
print("       <--------------------\ operating with Nmap /------------------>")
print("        <--------------------\-------------------/------------------>")

print("")
print("")

import nmap
import webbrowser

print(" > Ingresa la IP que desee escanear: ")

print("")
print("")

ip = input()

ex = nmap.PortScanner()

ex.scan(hosts=ip, arguments="-sV")

last = ex.get_nmap_last_output()

one = open("C:\\AppServ\\www\\ipslayer\\scans\\ip-slayer-scan_cve.xml", "w")

one.write(last)

one.close()


ex2 = nmap.PortScanner()

ex2.scan(hosts=ip, arguments="-sV --script vulners")

last2 = ex2.get_nmap_last_output()

one2 = open("C:\\AppServ\\www\\ipslayer\\scans\\ip-slayer-scan.xml", "w")

one2.write(last2)

one2.close()

print("")
print("")
print(" --> El escaneo de la red '" + ip + "' a terminado.")
print("")
print(" --> Puede revisar el último resultado en las páginas abiertas.")

webbrowser.open("http://localhost/ipslayer/ip-slayer_scan.php")
webbrowser.open("http://localhost/ipslayer/ip-slayer_scan_cve.php")

print("")
