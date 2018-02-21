using System.Collections;
using System.Collections.Generic;
using UnityEngine;
using UnityEngine.UI;

public class WebService : MonoBehaviour {

	// ----------------------------------------------------
	// Connection Variable
	// ----------------------------------------------------
	public Text ErrorTextConnect;
	public InputField UserInputConnect;
	public InputField PasseInputConnect;
	private string UrlConnect = "http://webservice/connection.php";

	// ----------------------------------------------------
	// Inscription Variable
	// ----------------------------------------------------
	public Text ErrorTextInscrit;
	public InputField UserInputInscrit;
	public InputField PasseInputInscrit;
	public InputField PasseReInputInscrit;
	public InputField EmailInputInscrit;
	public InputField EmailReInputInscrit;
	private string UrlInscrit = "http://webservice/inscription.php";

	// ----------------------------------------------------
	// Oublier Variable
	// ----------------------------------------------------
	public InputField EmailInputOublier;
	private string UrlOublier = "http://webservice/oublier.php";

	// ----------------------------------------------------
	// Connection Formulaire
	// ----------------------------------------------------
	// envoi du formulaire
	public void BoutonConnect() {
		StartCoroutine (WebConnect (UserInputConnect.text, PasseInputConnect.text));
	}
	// Connecter a l'url avec un retour reponse
	IEnumerator WebConnect(string User, string Passe) {
		WWWForm form = new WWWForm ();
		form.AddField ("LoginConnect", User);
		form.AddField ("PasseConnect", Passe);
		WWW www = new WWW (UrlConnect, form);
		yield return www;
		ErrorTextConnect.text = www.text;
	}

	// ----------------------------------------------------
	// Inscription Formulaire
	// ----------------------------------------------------
	public void BoutonInscrit() {
		StartCoroutine(WebInscrit(UserInputInscrit.text, PasseInputInscrit.text, PasseReInputInscrit.text, EmailInputInscrit.text, EmailReInputInscrit.text));
	}
	// Inscription lancer
	IEnumerator WebInscrit(string User, string Passe, string PasseRe, string Email, string EmailRe) {
		WWWForm form = new WWWForm ();
		form.AddField ("LoginInscrit", User);
		form.AddField ("PasseInscrit", Passe);
		form.AddField ("PasseReInscrit", PasseRe);
		form.AddField ("EmailInscrit", Email);
		form.AddField ("EmailReInscrit", EmailRe);
		WWW www = new WWW (UrlInscrit, form);
		yield return www;
		ErrorTextInscrit.text = www.text;
	}

	// ----------------------------------------------------
	// Oublier Formulaire
	// ----------------------------------------------------
	public void BoutonOublier() {
		Application.OpenURL (UrlOublier + "?emaildemande=" + EmailInputOublier.text);
	}
}
