package crc6428a89203e342b4f5;


public class ToDoListActivity
	extends android.app.Activity
	implements
		mono.android.IGCUserPeer
{
/** @hide */
	public static final String __md_methods;
	static {
		__md_methods = 
			"n_onCreate:(Landroid/os/Bundle;)V:GetOnCreate_Landroid_os_Bundle_Handler\n" +
			"";
		mono.android.Runtime.register ("ApplicationMobileXamarin.Views.ToDoListActivity, ApplicationMobileXamarin", ToDoListActivity.class, __md_methods);
	}


	public ToDoListActivity ()
	{
		super ();
		if (getClass () == ToDoListActivity.class) {
			mono.android.TypeManager.Activate ("ApplicationMobileXamarin.Views.ToDoListActivity, ApplicationMobileXamarin", "", this, new java.lang.Object[] {  });
		}
	}


	public void onCreate (android.os.Bundle p0)
	{
		n_onCreate (p0);
	}

	private native void n_onCreate (android.os.Bundle p0);

	private java.util.ArrayList refList;
	public void monodroidAddReference (java.lang.Object obj)
	{
		if (refList == null)
			refList = new java.util.ArrayList ();
		refList.add (obj);
	}

	public void monodroidClearReferences ()
	{
		if (refList != null)
			refList.clear ();
	}
}
